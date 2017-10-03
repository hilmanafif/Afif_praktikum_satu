<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnggotaKeluarga;
use App\Models\User;
use App\Services\AnggotaKeluargaService;
use App\Http\Requests\AnggotaKeluargaCreateRequest;
use App\Http\Requests\AnggotaKeluargaUpdateRequest;
use DB;

class AnggotaKeluargasController extends Controller
{
    public function __construct(AnggotaKeluargaService $anggotakeluargaService)
    {
        $this->service = $anggotakeluargaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anggotakeluargas = $this->service->paginated();
        return view('anggotakeluargas.index')->with('anggotakeluargas', $anggotakeluargas);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $anggotakeluargas = $this->service->search($request->search);
        return view('anggotakeluargas.index')->with('anggotakeluargas', $anggotakeluargas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggotakeluargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AnggotaKeluargaCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaKeluargaCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(url('admin/users/'.$request->user_id.'/edit#3'))->with('message', 'Successfully created');
            //return redirect(route('anggotakeluargas.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(url('admin/users/'.$request->user_id.'/edit#3'))->with('message', 'Failed to create');
    }

    /**
     * Display the anggotakeluarga.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggotakeluarga = $this->service->find($id);
        return view('anggotakeluargas.show')->with('anggotakeluarga', $anggotakeluarga);
    }

    /**
     * Show the form for editing the anggotakeluarga.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggotakeluarga = $this->service->find($id);
        return view('anggotakeluargas.edit')->with('anggotakeluarga', $anggotakeluarga);
    }

    /**
     * Update the anggotakeluargas in storage.
     *
     * @param  \Illuminate\Http\AnggotaKeluargaUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggotaKeluargaUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            //return redirect(route('anggotakeluargas.index'))->with('message', 'Successfully updated');
            return redirect('admin/users/'.$request->user_id.'/edit?button=4')->with('message', 'Successfully deleted')->with('button', '4');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the anggotakeluargas from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('anggotakeluargas.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('anggotakeluargas.index'))->with('message', 'Failed to delete');
    }
    public function changeActive($id)
    {
        $ak = AnggotaKeluarga::findOrFail($id);

        if ($ak->is_active==1) {
          $result = $ak->update(['is_active'=>0]);
        }
        else {
          $result = $ak->update(['is_active'=>1]);
        }

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }
    public function exec(){
        
        $users=User::all();
        foreach ($users as $user) {
            $anggotakeluarga=DB::table('temp_anggotakeluarga')->where('nipp',$user->employee_number)->first();
            if ($anggotakeluarga) {
                if ($anggotakeluarga->istri) {
                    AnggotaKeluarga::create(['user_id'=>$user->id,
                                             'nama'=>$anggotakeluarga->istri,
                                             'hub_keluarga'=>"pasangan",
                                             'tanggal_lahir'=>$anggotakeluarga->lahiristri,
                                             'agama_id'=>1,
                                             'is_active'=>1]);
                }
                if ($anggotakeluarga->anak1) {
                    AnggotaKeluarga::create(['user_id'=>$user->id,
                                             'nama'=>$anggotakeluarga->anak1,
                                             'hub_keluarga'=>"anak",
                                             'tanggal_lahir'=>$anggotakeluarga->lahiranak1,
                                             'agama_id'=>1,
                                             'is_active'=>1]);
                }
                if ($anggotakeluarga->anak2) {
                    AnggotaKeluarga::create(['user_id'=>$user->id,
                                             'nama'=>$anggotakeluarga->anak2,
                                             'hub_keluarga'=>"anak",
                                             'tanggal_lahir'=>$anggotakeluarga->lahiranak2,
                                             'agama_id'=>1,
                                             'is_active'=>1]);
                }
                if ($anggotakeluarga->anak3) {
                    AnggotaKeluarga::create(['user_id'=>$user->id,
                                             'nama'=>$anggotakeluarga->anak3,
                                             'hub_keluarga'=>"anak",
                                             'tanggal_lahir'=>$anggotakeluarga->lahiranak3,
                                             'agama_id'=>1,
                                             'is_active'=>1]);
                }
            }
        }
        return 8;
    }
}
