<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\JabatanService;
use App\Http\Requests\JabatanCreateRequest;
use App\Http\Requests\JabatanUpdateRequest;

class JabatansController extends Controller
{
    public function __construct(JabatanService $jabatanService)
    {
        $this->service = $jabatanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatans = $this->service->paginated();
        return view('jabatans.index')->with('jabatans', $jabatans);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $jabatans = $this->service->search($request->search);
        return view('jabatans.index')->with('jabatans', $jabatans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\JabatanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('jabatans.index'))->with('message', 'Successfully created');
            //return redirect(route('jabatans.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('jabatans.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the jabatan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jabatan = $this->service->find($id);
        return view('jabatans.show')->with('jabatan', $jabatan);
    }

    /**
     * Show the form for editing the jabatan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = $this->service->find($id);
        return view('jabatans.edit')->with('jabatan', $jabatan);
    }

    /**
     * Update the jabatans in storage.
     *
     * @param  \Illuminate\Http\JabatanUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('jabatans.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the jabatans from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('jabatans.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('jabatans.index'))->with('message', 'Failed to delete');
    }
}
