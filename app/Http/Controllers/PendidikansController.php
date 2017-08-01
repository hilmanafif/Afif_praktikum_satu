<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PendidikanService;
use App\Http\Requests\PendidikanCreateRequest;
use App\Http\Requests\PendidikanUpdateRequest;

class PendidikansController extends Controller
{
    public function __construct(PendidikanService $pendidikanService)
    {
        $this->service = $pendidikanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pendidikans = $this->service->paginated();
        return view('pendidikans.index')->with('pendidikans', $pendidikans);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $pendidikans = $this->service->search($request->search);
        return view('pendidikans.index')->with('pendidikans', $pendidikans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendidikans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PendidikanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendidikanCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(url('admin/users/'.$request->user_id.'/edit?button=5'))->with('message', 'Successfully created');
            //return redirect(route('pendidikans.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(url('admin/users/'.$request->user_id.'/edit?button=5'))->with('message', 'Failed to create');
    }

    /**
     * Display the pendidikan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidikan = $this->service->find($id);
        return view('pendidikans.show')->with('pendidikan', $pendidikan);
    }

    /**
     * Show the form for editing the pendidikan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendidikan = $this->service->find($id);
        return view('pendidikans.edit')->with('pendidikan', $pendidikan);
    }

    /**
     * Update the pendidikans in storage.
     *
     * @param  \Illuminate\Http\PendidikanUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendidikanUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(url('admin/users/'.$request->user_id.'/edit?button=5'))->with('message', 'Successfully created');
        }

        return redirect(url('admin/users/'.$request->user_id.'/edit?button=5'))->with('message', 'Failed to update');
    }

    /**
     * Remove the pendidikans from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('pendidikans.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('pendidikans.index'))->with('message', 'Failed to delete');
    }
}
