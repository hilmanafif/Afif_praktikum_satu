<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LeavetypeService;
use App\Http\Requests\LeavetypeRequest;

class LeavetypesController extends Controller
{
    public function __construct(LeavetypeService $leavetypeService)
    {
        $this->service = $leavetypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leavetypes = $this->service->paginated();
        return view('leavetypes.index')->with('leavetypes', $leavetypes);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $leavetypes = $this->service->search($request->search);
        return view('leavetypes.index')->with('leavetypes', $leavetypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leavetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LeavetypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeavetypeRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('leavetypes.index'))->with('message', 'Successfully created');
        }

        return redirect(route('leavetypes.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the leavetypes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leavetype = $this->service->find($id);
        return view('leavetypes.show')->with('leavetype', $leavetype);
    }

    /**
     * Show the form for editing the leavetypes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leavetype = $this->service->find($id);
        return view('leavetypes.edit')->with('leavetype', $leavetype);
    }

    /**
     * Update the leavetypes in storage.
     *
     * @param  \Illuminate\Http\LeavetypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeavetypeRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('leavetypes.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the leavetypes from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('leavetypes.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('leavetypes.index'))->with('message', 'Failed to delete');
    }
}
