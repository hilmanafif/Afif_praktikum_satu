<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DocumenttypeService;
use App\Http\Requests\DocumenttypeRequest;

class DocumenttypesController extends Controller
{
    public function __construct(DocumenttypeService $documenttypeService)
    {
        $this->service = $documenttypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documenttypes = $this->service->paginated();
        return view('documenttypes.index')->with('documenttypes', $documenttypes);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $documenttypes = $this->service->search($request->search);
        return view('documenttypes.index')->with('documenttypes', $documenttypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documenttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DocumenttypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumenttypeRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('documenttypes.index'))->with('message', 'Successfully created');
        }

        return redirect(route('documenttypes.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the documenttypes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documenttype = $this->service->find($id);
        return view('documenttypes.show')->with('documenttype', $documenttype);
    }

    /**
     * Show the form for editing the documenttypes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documenttype = $this->service->find($id);
        return view('documenttypes.edit')->with('documenttype', $documenttype);
    }

    /**
     * Update the documenttypes in storage.
     *
     * @param  \Illuminate\Http\DocumenttypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumenttypeRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('documenttypes.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the documenttypes from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('documenttypes.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('documenttypes.index'))->with('message', 'Failed to delete');
    }
}
