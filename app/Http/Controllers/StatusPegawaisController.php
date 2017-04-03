<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StatusPegawaiService;
use App\Http\Requests\StatusPegawaiCreateRequest;
use App\Http\Requests\StatusPegawaiUpdateRequest;

class StatusPegawaisController extends Controller
{
    public function __construct(StatusPegawaiService $statuspegawaiService)
    {
        $this->service = $statuspegawaiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuspegawais = $this->service->paginated();
        return view('statuspegawais.index')->with('statuspegawais', $statuspegawais);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $statuspegawais = $this->service->search($request->search);
        return view('statuspegawais.index')->with('statuspegawais', $statuspegawais);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuspegawais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StatusPegawaiCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusPegawaiCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('statuspegawais.index'))->with('message', 'Successfully created');
            //return redirect(route('statuspegawais.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('statuspegawais.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the statuspegawai.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statuspegawai = $this->service->find($id);
        return view('statuspegawais.show')->with('statuspegawai', $statuspegawai);
    }

    /**
     * Show the form for editing the statuspegawai.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuspegawai = $this->service->find($id);
        return view('statuspegawais.edit')->with('statuspegawai', $statuspegawai);
    }

    /**
     * Update the statuspegawais in storage.
     *
     * @param  \Illuminate\Http\StatusPegawaiUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusPegawaiUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('statuspegawais.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the statuspegawais from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('statuspegawais.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('statuspegawais.index'))->with('message', 'Failed to delete');
    }
}
