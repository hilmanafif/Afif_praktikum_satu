<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PengalamanService;
use App\Http\Requests\PengalamanCreateRequest;
use App\Http\Requests\PengalamanUpdateRequest;

class PengalamansController extends Controller
{
    public function __construct(PengalamanService $pengalamanService)
    {
        $this->service = $pengalamanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengalamans = $this->service->paginated();
        return view('pengalamans.index')->with('pengalamans', $pengalamans);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $pengalamans = $this->service->search($request->search);
        return view('pengalamans.index')->with('pengalamans', $pengalamans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengalamans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PengalamanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengalamanCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(url('admin/users/'.$request->user_id.'/edit?button=6'))->with('message', 'Successfully created');
            //return redirect(route('pengalaman.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(url('admin/users/'.$request->user_id.'/edit?button=6'))->with('message', 'Failed to create');
    }

    /**
     * Display the pengalaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengalaman = $this->service->find($id);
        return view('pengalamans.show')->with('pengalamans', $pengalamans);
    }

    /**
     * Show the form for editing the pengalaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengalaman = $this->service->find($id);
        return view('pengalamans.edit')->with('pengalaman', $pengalaman);
    }

    /**
     * Update the pengalaman in storage.
     *
     * @param  \Illuminate\Http\PengalamanUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengalamanUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(url('admin/users/'.$request->user_id.'/edit?button=6'))->with('message', 'Successfully updated');
        }

        return redirect(url('admin/users/'.$request->user_id.'/edit?button=6'))->with('message', 'Failed to create');
    }

    /**
     * Remove the pengalaman from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('pengalamans.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('pengalamans.index'))->with('message', 'Failed to delete');
    }
}
