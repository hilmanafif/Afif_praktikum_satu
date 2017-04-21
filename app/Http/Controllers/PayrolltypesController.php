<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayrolltypeService;
use App\Http\Requests\PayrolltypeCreateRequest;
use App\Http\Requests\PayrolltypeUpdateRequest;

class PayrolltypesController extends Controller
{
    public function __construct(PayrolltypeService $payrolltypeService)
    {
        $this->service = $payrolltypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payrolltypes = $this->service->paginated();
        return view('payrolltypes.index')->with('payrolltypes', $payrolltypes);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $payrolltypes = $this->service->search($request->search);
        return view('payrolltypes.index')->with('payrolltypes', $payrolltypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payrolltypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PayrolltypeCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayrolltypeCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('payrolltypes.index'))->with('message', 'Successfully created');
            //return redirect(route('payrolltypes.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('payrolltypes.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the payrolltype.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payrolltype = $this->service->find($id);
        return view('payrolltypes.show')->with('payrolltype', $payrolltype);
    }

    /**
     * Show the form for editing the payrolltype.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payrolltype = $this->service->find($id);
        return view('payrolltypes.edit')->with('payrolltype', $payrolltype);
    }

    /**
     * Update the payrolltypes in storage.
     *
     * @param  \Illuminate\Http\PayrolltypeUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PayrolltypeUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('payrolltypes.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the payrolltypes from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('payrolltypes.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('payrolltypes.index'))->with('message', 'Failed to delete');
    }
}
