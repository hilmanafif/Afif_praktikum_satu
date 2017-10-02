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
use DB;

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
        $payrolls = Payroll::where('payrolltype_id','=',$request->payrolltype)->where('approved','=',1)->orderBy('start_date', 'DESC')->orderBy('employee_number')->orderBy('name')->paginate();
        //$payrollPeriod = Payroll::select('start_date','end_date')->groupBy('start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $payrollPeriod = Payroll::where('approved','=',1)->select('title')->groupBy('title')->get();
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
        //$payrollPeriod = Payroll::select('start_date','end_date')->groupBy('start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $payrollPeriod = Payroll::select('title')->groupBy('title')->get();
        return view('payrolls.index',compact('payrolls','payrollPeriod'));
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
      $employees=User::where('statuskerja_id','=',1)->where('pangkat_id','!=',0)->where('ruang','!=',0)->get();
      $start_date=$request->fromDate;
      $end_date=$request->toDate;
      $slip_name=$request->name;
      $payrolltype=$request->payrolltype;
      //HARDCODED PAYROLL TYPE
        //FIRST PHASE PAYROLL
        $tergenerate = 0;
        foreach ($employees as $employee) {
        if ($payrolltype){
          $tergenerate = $tergenerate + 1;
          //FIND GAPOK
          // $pangkat=$employee->pangkats;
          // $masakerja=User::masakerja($employee->id);
          $gapok=GajiPokok::where('pangkat_id',$employee->pangkat_id)
                          ->where('ruang',$employee->ruang)
                          ->first();
          if (!$gapok) {
            return "Gapok dengan pangkat ".$employee->pangkat_id." dan ruang ".$employee->ruang." tidak ditemukan";
          }

          // GAPOK calon pegawai hanya 80% gapok asli
          //if ($employee->statuskerja_id=1) {
          //  $gapok->gaji_pokok = $gapok->gaji_pokok * 80 / 100;
          //}

          $datas = ["title" => $slip_name,
                    "user_id" => $employee->id,
                    "employee_number" => $employee->employee_number,
                    "name" => $employee->name,
                    "pangkat_id" => $employee->pangkat_id,
                    "start_date" => $start_date,
                    "end_date" => $end_date,
                    "gapok" => $gapok->gaji_pokok,
                    "tunjangan_istri" => $employee->tunjanganIstri($employee->id),
                    "tunjangan_anak" => $employee->tunjanganAnak($employee->id),
                    "tunjangan_natura" => $employee->natura($employee->id),
                    "tunjangan_kinerja" => $employee->jabatans->Tunpres,
                    "tunjangan_jabatan" => $employee->jabatans->Tunjab,
                    "tunjangan_kendaraan" => $employee->jabatans->Tunken,
                    "tunjangan_pelaksana" => $employee->tunjanganPelaksana($employee->tupel_id),
                    "payrolltype_id" => $payrolltype,
                    "approved" => 0];
          $result = $this->service->create($datas);
        } // End if payrolltype

        //SECOND PHASE PAYROLL
        /*
        elseif ($payrolltype==2) {
          $gapok=GajiPokok::where('pangkat_id',$employee->pangkat_id)
                          ->where('ruang',$employee->ruang)
                          ->first();
          if (!$gapok) {
            return "gapok dengan pangkat ".$employee->pangkat_id." dan ruang ".$employee->ruang." tidak ditemukan";
          }
          $datas = ["title"=> $slip_name,
                    "user_id"=>$employee->id,
                    "employee_number"=>$employee->employee_number,
                    "name"=>$employee->name,
                    "pangkat_id"=>$employee->pangkat_id,
                    "start_date"=>$start_date,
                    "end_date"=>$end_date,
                    "gapok"=>$gapok->gaji_pokok,
                    "payrolltype_id"=>$payrolltype,
                    "approved"=> 0];
          $result = $this->service->create($datas);
        }
        */
        /*
        else {
          return 404;
        }
        */


      }

      // HANDLING DIREKTUR (SEMENTARA, nanti harus masukan jabatan_id ke payroll)
      $findlargestgapok = Payroll::where('title',$slip_name)->where('start_date',$start_date)->orderBy('gapok','DESC')->first();

      $finddirektur = Payroll::where('user_id',369)->update(['gapok' => $findlargestgapok->gapok * 2.35]);
      $finddirektur = Payroll::where('user_id',369)->first();
      $finddirekturbidang = Payroll::where('user_id',30)->update(['gapok' => $finddirektur->gapok * 90 / 100]);
      $finddirekturbidang = Payroll::where('user_id',108)->update(['gapok' => $finddirektur->gapok * 90 / 100]);

      return redirect(route('payrollwizards',['button'=>'tostep2','status'=>'generated', 'total' => $tergenerate]));
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
        /*
        $userModel=new User;
        $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
        $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
        $payroll['natura']=$userModel->natura($employee->id);
        $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
        $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
        $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;
        $payroll['tunjanganKendaraan']=$employee->jabatans->Tunken;
        $payroll['tunjanganPelaksana']=$userModel->tunjanganPelaksana($employee->tupel_id);
        */
        // Potongan Sementara
        $payroll['jabatan']=$employee->potongan->jabatan;
        $payroll['bpjs']=$employee->potongan->bpjs;
        $payroll['dapenma']=$employee->potongan->dapenma;
        $payroll['bpjskes']=$employee->potongan->bpjskes;
        $payroll['bpjspensiun']=$employee->potongan->bpjspensiun;
        $payroll['zakat']=$employee->potongan->zakat;
        $payroll['bjb']=$employee->potongan->bjb;
        $payroll['iurandw']=$employee->potongan->iurandw;
        $payroll['tabungan']=$employee->potongan->tabungan;
        $payroll['warung']=$employee->potongan->warung;
        $payroll['pinjrutin']=$employee->potongan->pinjrutin;
        $payroll['pinjperum']=$employee->potongan->pinjperum;
        $payroll['utangpeg']=$employee->potongan->utangpeg;
        $payroll['potlain']=$employee->potongan->potlain;
        $payroll['iuranykpp']=$employee->potongan->iuranykpp;
        $payroll['totalPotongan']=$payroll['bpjs']+$payroll['dapenma']+$payroll['bpjskes']+$payroll['bpjspensiun']+$payroll['zakat']+$payroll['bjb']+$payroll['iurandw']+$payroll['tabungan']+$payroll['warung']+$payroll['pinjrutin']+$payroll['pinjperum']+$payroll['utangpeg']+$payroll['potlain']+$payroll['iuranykpp'];

        $payroll['tunjanganIstri']=$payroll->tunjangan_istri;
        $payroll['tunjanganAnak']=$payroll->tunjangan_anak;
        $payroll['natura']=$payroll->tunjangan_natura;
        $payroll['tunjanganKinerja']=$payroll->tunjangan_kinerja;
        $payroll['tunjanganJabatan']=$payroll->tunjangan_jabatan;
        $payroll['tunjanganPerumahan']=$payroll->tunjangan_perumahan;
        $payroll['tunjanganKendaraan']=$payroll->tunjangan_kendaraan;
        $payroll['tunjanganPelaksana']=$payroll->tunjangan_pelaksana;
        $payroll['subtotal']=$payroll->gapok;
        $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
        $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganKendaraan'];
        $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];

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
        /*
        $userModel=new User;
        $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
        $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
        $payroll['natura']=$userModel->natura($employee->id);
        $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
        $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
        $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
        $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;
        */
        $payroll['jabatan']=$employee->potongan->jabatan;
        $payroll['bpjs']=$employee->potongan->bpjs;
        $payroll['dapenma']=$employee->potongan->dapenma;
        $payroll['bpjskes']=$employee->potongan->bpjskes;
        $payroll['bpjspensiun']=$employee->potongan->bpjspensiun;
        $payroll['zakat']=$employee->potongan->zakat;
        $payroll['bjb']=$employee->potongan->bjb;
        $payroll['iurandw']=$employee->potongan->iurandw;
        $payroll['tabungan']=$employee->potongan->tabungan;
        $payroll['warung']=$employee->potongan->warung;
        $payroll['pinjrutin']=$employee->potongan->pinjrutin;
        $payroll['pinjperum']=$employee->potongan->pinjperum;
        $payroll['utangpeg']=$employee->potongan->utangpeg;
        $payroll['potlain']=$employee->potongan->potlain;
        $payroll['iuranykpp']=$employee->potongan->iuranykpp;
        $payroll['totalPotongan']=$payroll['bpjs']+$payroll['dapenma']+$payroll['bpjskes']+$payroll['bpjspensiun']+$payroll['zakat']+$payroll['bjb']+$payroll['iurandw']+$payroll['tabungan']+$payroll['warung']+$payroll['pinjrutin']+$payroll['pinjperum']+$payroll['utangpeg']+$payroll['potlain']+$payroll['iuranykpp'];

        $payroll['tunjanganIstri']=$payroll->tunjangan_istri;
        $payroll['tunjanganAnak']=$payroll->tunjangan_anak;
        $payroll['natura']=$payroll->tunjangan_natura;
        $payroll['tunjanganKinerja']=$payroll->tunjangan_kinerja;
        $payroll['tunjanganJabatan']=$payroll->tunjangan_jabatan;
        $payroll['tunjanganPerumahan']=$payroll->tunjangan_perumahan;
        $payroll['tunjanganKendaraan']=$payroll->tunjangan_kendaraan;
        $payroll['tunjanganPelaksana']=$payroll->tunjangan_pelaksana;
        $payroll['subtotal']=$payroll->gapok;
        $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
        $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganKendaraan'];
        $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];

        $payroll['jumlahTunjangan']=0;
        $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
        $data['payroll'] = $payroll;
        $data['tunjangan'] = $payroll;
        $pdf = PDF::loadView('payrolls.cetakPayroll', $data)->setPaper('a4')->setOrientation('landscape');
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
            /*
            $userModel=new User;
            $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
            $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
            $payroll['natura']=$userModel->natura($employee->id);
            $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
            $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
            $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
            $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;
            */
            $payroll['jabatan']=$employee->potongan->jabatan;
            $payroll['bpjs']=$employee->potongan->bpjs;
            $payroll['dapenma']=$employee->potongan->dapenma;
            $payroll['bpjskes']=$employee->potongan->bpjskes;
            $payroll['bpjspensiun']=$employee->potongan->bpjspensiun;
            $payroll['zakat']=$employee->potongan->zakat;
            $payroll['bjb']=$employee->potongan->bjb;
            $payroll['iurandw']=$employee->potongan->iurandw;
            $payroll['tabungan']=$employee->potongan->tabungan;
            $payroll['warung']=$employee->potongan->warung;
            $payroll['pinjrutin']=$employee->potongan->pinjrutin;
            $payroll['pinjperum']=$employee->potongan->pinjperum;
            $payroll['utangpeg']=$employee->potongan->utangpeg;
            $payroll['potlain']=$employee->potongan->potlain;
            $payroll['iuranykpp']=$employee->potongan->iuranykpp;
            $payroll['totalPotongan']=$payroll['bpjs']+$payroll['dapenma']+$payroll['bpjskes']+$payroll['bpjspensiun']+$payroll['zakat']+$payroll['bjb']+$payroll['iurandw']+$payroll['tabungan']+$payroll['warung']+$payroll['pinjrutin']+$payroll['pinjperum']+$payroll['utangpeg']+$payroll['potlain']+$payroll['iuranykpp'];

            $payroll['tunjanganIstri']=$payroll->tunjangan_istri;
            $payroll['tunjanganAnak']=$payroll->tunjangan_anak;
            $payroll['natura']=$payroll->tunjangan_natura;
            $payroll['tunjanganKinerja']=$payroll->tunjangan_kinerja;
            $payroll['tunjanganJabatan']=$payroll->tunjangan_jabatan;
            $payroll['tunjanganPerumahan']=$payroll->tunjangan_perumahan;
            $payroll['tunjanganKendaraan']=$payroll->tunjangan_kendaraan;
            $payroll['tunjanganPelaksana']=$payroll->tunjangan_pelaksana;
            $payroll['subtotal']=$payroll->gapok;
            $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
            $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganKendaraan'];
            $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];

            $payroll['jumlahTunjangan']=0;
            $payroll['gajiBersih']=$payroll['totalPenghasilan']-$payroll['totalPotongan'];
            $payrolls[]=$payroll;
          }
        }
        elseif ($request->printType=="all"){
            /*
            $periodRange=explode(",",$request->periode);
            $startDate=$periodRange[0];
            $endDate=$periodRange[1];
            $payrolls= Payroll::where('start_date',$startDate)->where('end_date',$endDate)->get();
            */
            $payrolls= Payroll::where('title',$request->periode)->get();
            foreach ($payrolls as $payroll) {
              // if (!$payroll->users->jabatans) {
              //   return "no jabatan_id ".$payroll->users->id;
              // }
              $employee=User::findOrFail($payroll->users->id);
              /*
              $userModel=new User;
              $payroll['tunjanganIstri']=$userModel->tunjanganIstri($employee->id);
              $payroll['tunjanganAnak']=$userModel->tunjanganAnak($employee->id);
              $payroll['natura']=$userModel->natura($employee->id);
              $payroll['tunjanganKinerja']=$employee->jabatans->Tunpres;
              $payroll['tunjanganJabatan']=$employee->jabatans->Tunjab;
              $payroll['tunjanganPelaksana']=$employee->jabatans->Tupel;
              $payroll['tunjanganPerumahan']=$employee->jabatans->Turam;
              */
              $payroll['jabatan']=$employee->potongan->jabatan;
              $payroll['bpjs']=$employee->potongan->bpjs;
              $payroll['dapenma']=$employee->potongan->dapenma;
              $payroll['bpjskes']=$employee->potongan->bpjskes;
              $payroll['bpjspensiun']=$employee->potongan->bpjspensiun;
              $payroll['zakat']=$employee->potongan->zakat;
              $payroll['bjb']=$employee->potongan->bjb;
              $payroll['iurandw']=$employee->potongan->iurandw;
              $payroll['tabungan']=$employee->potongan->tabungan;
              $payroll['warung']=$employee->potongan->warung;
              $payroll['pinjrutin']=$employee->potongan->pinjrutin;
              $payroll['pinjperum']=$employee->potongan->pinjperum;
              $payroll['utangpeg']=$employee->potongan->utangpeg;
              $payroll['potlain']=$employee->potongan->potlain;
              $payroll['iuranykpp']=$employee->potongan->iuranykpp;
              $payroll['totalPotongan']=$payroll['bpjs']+$payroll['dapenma']+$payroll['bpjskes']+$payroll['bpjspensiun']+$payroll['zakat']+$payroll['bjb']+$payroll['iurandw']+$payroll['tabungan']+$payroll['warung']+$payroll['pinjrutin']+$payroll['pinjperum']+$payroll['utangpeg']+$payroll['potlain']+$payroll['iuranykpp'];

              $payroll['tunjanganIstri']=$payroll->tunjangan_istri;
              $payroll['tunjanganAnak']=$payroll->tunjangan_anak;
              $payroll['natura']=$payroll->tunjangan_natura;
              $payroll['tunjanganKinerja']=$payroll->tunjangan_kinerja;
              $payroll['tunjanganJabatan']=$payroll->tunjangan_jabatan;
              $payroll['tunjanganPerumahan']=$payroll->tunjangan_perumahan;
              $payroll['tunjanganKendaraan']=$payroll->tunjangan_kendaraan;
              $payroll['tunjanganPelaksana']=$payroll->tunjangan_pelaksana;
              $payroll['subtotal']=$payroll->gapok;
              $payroll['subtotalA']=$payroll->gapok+$payroll['tunjanganIstri']+$payroll['tunjanganAnak']+$payroll['natura'];
              $payroll['subtotalB']=$payroll['tunjanganKinerja']+$payroll['tunjanganJabatan']+$payroll['tunjanganPelaksana']+$payroll['tunjanganPerumahan'];
              $payroll['totalPenghasilan']=$payroll['subtotalA']+$payroll['subtotalB'];

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

    public function wizard(Request $request)
    {
        $unapproveds = Payroll::groupBy('title')->select('title', DB::raw('count(*) as total'))->where('approved','=',0)->get();
        return view('payrolls.wizard')->with('unapproveds',$unapproveds);
    }

    public function wizardreject(Request $request)
    {
        $result = Payroll::where('approved','=',0)->where('title','=',$request->title)->delete();

        if ($result) {
            return redirect(route('payrollwizards',['button'=>'tostep3']))->with('message', 'Generated slip berhasil ditolak/dihapus!');
        }
        return redirect(route('payrollwizards',['button'=>'tostep3']))->with('message', 'Generated slip gagal ditolak/dihapus!');
    }

    public function wizardapprove(Request $request)
    {
        $result = Payroll::where('approved','=',0)->where('title','=',$request->title)->update(['approved' => 1]);

        if ($result) {
            return redirect(route('payrollwizards',['button'=>'tostep3']))->with('message', 'Generated slip berhasil diapprove!');
        }
        return redirect(route('payrollwizards',['button'=>'tostep3']))->with('message', 'Generated slip gagal diapprove!');
    }

    public function wizardreview(Request $request)
    {
        $payrolls = Payroll::where('approved','=',0)->where('title','=',$request->title)->orderBy('employee_number')->orderBy('name')->paginate();
        //$payrollPeriod = Payroll::select('start_date','end_date')->groupBy('start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $title = $request->title;
        $total_slip = $payrolls->total();
        $total_gapok = Payroll::where('approved','=',0)->where('title','=',$request->title)->sum('gapok');
        return view('payrolls.review',compact('payrolls','title','total_slip','total_gapok'));
    }
}
