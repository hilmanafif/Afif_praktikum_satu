<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SubjabatanService;
use App\Http\Requests\SubjabatanCreateRequest;
use App\Http\Requests\SubjabatanUpdateRequest;

class SubjabatansController extends Controller
{
    public function __construct(SubjabatanService $subjabatanService)
    {
        $this->service = $subjabatanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjabatans = $this->service->paginated();
        return view('subjabatans.index')->with('subjabatans', $subjabatans);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $subjabatans = $this->service->search($request->search);
        return view('subjabatans.index')->with('subjabatans', $subjabatans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjabatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SubjabatanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjabatanCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('subjabatans.index'))->with('message', 'Successfully created');
            //return redirect(route('subjabatans.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('subjabatans.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the subjabatan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subjabatan = $this->service->find($id);
        return view('subjabatans.show')->with('subjabatan', $subjabatan);
    }

    /**
     * Show the form for editing the subjabatan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjabatan = $this->service->find($id);
        return view('subjabatans.edit')->with('subjabatan', $subjabatan);
    }

    /**
     * Update the subjabatans in storage.
     *
     * @param  \Illuminate\Http\SubjabatanUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjabatanUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('subjabatans.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the subjabatans from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('subjabatans.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('subjabatans.index'))->with('message', 'Failed to delete');
    }
}
