<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayrollService;
use App\Http\Requests\PayrollCreateRequest;
use App\Http\Requests\PayrollUpdateRequest;
use App\Models\Payroll;
use App\Models\User;
use App\Models\GajiPokok;
use PDF;

class PayrollsController extends Controller
{
    public function __construct(PayrollService $payrollService)
    {
        $this->service = $payrollService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payrolls = $this->service->paginated();
        $payrollPeriod = Payroll::select('start_date','end_date')->groupBy('start_date','end_date')->orderBy('start_date', 'DESC')->get();
        return view('payrolls.index',compact('payrolls','payrollPeriod'));
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $payrolls = $this->service->search($request->search);
        return view('payrolls.index')->with('payrolls', $payrolls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payrolls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PayrollCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayrollCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('payrolls.index'))->with('message', 'Successfully created');
            //return redirect(route('payrolls.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('payrolls.index'))->with('message', 'Failed to create');
    }

    public function generatePayroll(Request $request){
      $employees=User::where('pangkat_id','!=',0)->where('ruang','!=',0)->get();
      $start_date=$request->fromDate;
      $end_date=$request->toDate;
      $phase=$request->phase;
      //HARDCODED PAYROLL TYPE
        //FIRST PHASE PAYROLL
        foreach ($employees as $employee) {
        if ($phase==1){
          //FIND GAPOK
          // $pangkat=$employee->pangkats;
          // $masakerja=User::masakerja($employee->id);
          $gapok=GajiPokok::where('pangkat_id',$employee->pangkat_id)
                          ->where('ruang',$employee->ruang)
                          ->first();
          if (!$gapok) {
            return "gapok dengan pangkat ".$employee->pangkat_id." dan ruang ".$employee->ruang." tidak ditemukan";
          }
          $datas = ["title"=>"Gaji ".$employee->name." tahap 1",
                    "user_id"=>$employee->id,
                    "name"=>$employee->name,
                    "pangkat_id"=>$employee->pangkat_id,
                    "start_date"=>$start_date,
                    "end_date"=>$end_date,
                    "gapok"=>$gapok->gaji_pokok,
                    "payrolltype_id"=>1];
          $result = $this->service->create($datas);
          }
        //SECOND PHASE PAYROLL
        elseif ($phase==2) {
          $gapok=GajiPokok::where('pangkat_id',$employee->pangkat_id)
                          ->where('ruang',$employee->ruang)
                          ->first();
          if (!$gapok) {
            return "gapok dengan pangkat ".$employee->pangkat_id." dan ruang ".$employee->ruang." tidak ditemukan";
          }
          $datas = ["title"=>"Gaji ".$employee->name." tahap 2",
                    "user_id"=>$employee->id,
                    "name"=>$employee->name,
                    "pangkat_id"=>$employee->pangkat_id,
                    "start_date"=>$start_date,
                    "end_date"=>$end_date,
                    "gapok"=>$gapok->gaji_pokok,
                    "payrolltype_id"=>2];
          $result = $this->service->create($datas);
        }
        else {
          return 404;
        }
      }
      return redirect(route('payrolls.index'))->with('message', 'Payroll Generated');
    }

    /**
     * Display the payroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payroll = $this->service->find($id);
        $employee=User::findOrFail($payroll->users->id);

        $userModel=new User;
        $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
        $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
        $payroll['natura']=$userModel->natura($employee->id);
        $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
        $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
        $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;
        //TEMPORARY
        if ($employee->tupel_id=="P1") {
          $payroll['tunjanganPelaksana']=100000;
        }
        elseif ($employee->tupel_id=="P2") {
          $payroll['tunjanganPelaksana']=200000;
        }
        elseif ($employee->tupel_id=="P3") {
          $payroll['tunjanganPelaksana']=300000;
        }
        elseif ($employee->tupel_id=="P4") {
          $payroll['tunjanganPelaksana']=400000;
        }
        else {
          $payroll['tunjanganPelaksana']=0;
        }

        $payroll['subtotal']=$payroll->gapok;
        $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
        $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganPerumahan'];
        $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];
        $payroll['totalPotongan']=0;
        $payroll['jumlahTunjangan']=0;
        $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
        return view('payrolls.payrollRegular')->with('payroll',$payroll);
    }

    /**
     * Show the form for editing the payroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payroll = $this->service->find($id);
        return view('payrolls.edit')->with('payroll', $payroll);
    }

    /**
     * Update the payrolls in storage.
     *
     * @param  \Illuminate\Http\PayrollUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PayrollUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('payrolls.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the payrolls from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('payrolls.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('payrolls.index'))->with('message', 'Failed to delete');
    }
    public function cetakSlipGaji($id)
    {
        $payroll = $this->service->find($id);
        $employee=User::findOrFail($payroll->users->id);

        $userModel=new User;
        $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
        $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
        $payroll['natura']=$userModel->natura($employee->id);
        $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
        $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
        $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
        $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;

        $payroll['subtotal']=$payroll->gapok;
        $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
        $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganPerumahan'];
        $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];
        $payroll['totalPotongan']=0;
        $payroll['jumlahTunjangan']=0;
        $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
        $data['payroll'] = $payroll;
        $data['tunjangan'] = $payroll;
        $pdf = PDF::loadView('payrolls.cetakPayroll', $data)->setPaper('a4')->setOrientation('landscape');;
        if ($payroll->payrolltype_id==1) {
          $filename = "Slip gaji ".$payroll->users->name." akhir bulan.pdf";
        }
        elseif ($payroll->payrolltype_id==2) {
          $filename = "Slip gaji ".$payroll->users->name." tengah bulan.pdf";
        }
        return $pdf->inline($filename);
    }
    public function cetakMultipleSlipGaji(Request $request)
    {
        $payrolls = [];
        if ($request->printType=="selected") {
          foreach ($request->cetakList as $selectedPayroll) {
            $payroll=Payroll::find($selectedPayroll);
            $employee=User::findOrFail($payroll->users->id);

            $userModel=new User;
            $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
            $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
            $payroll['natura']=$userModel->natura($employee->id);
            $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
            $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
            $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
            $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;


            $payroll['subtotal']=$payroll->gapok;
            $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
            $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganPerumahan'];
            $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];
            $payroll['totalPotongan']=0;
            $payroll['jumlahTunjangan']=0;
            $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
            $payrolls[]=$payroll;
          }
        }
        elseif ($request->printType=="all"){
            $periodRange=explode(",",$request->periode);
            $startDate=$periodRange[0];
            $endDate=$periodRange[1];
            $payrolls= Payroll::where('start_date',$startDate)->where('end_date',$endDate)->get();
            foreach ($payrolls as $payroll) {
              // if (!$payroll->users->jabatans) {
              //   return "no jabatan_id ".$payroll->users->id;
              // }
              $employee=User::findOrFail($payroll->users->id);

              $userModel=new User;
              $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
              $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
              $payroll['natura']=$userModel->natura($employee->id);
              $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
              $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
              $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
              $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;


              $payroll['subtotal']=$payroll->gapok;
              $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
              $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganPerumahan'];
              $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];
              $payroll['totalPotongan']=0;
              $payroll['jumlahTunjangan']=0;
              $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
              $payrolls[]=$payroll;
            }
        }

          $data['payrolls'] = $payrolls;

          $pdf = PDF::loadView('payrolls.cetakMultiplePayroll', $data)->setPaper('a4')->setOrientation('landscape');
          $filename = "Slip gaji.pdf";
          return $pdf->inline($filename);
    }
}
