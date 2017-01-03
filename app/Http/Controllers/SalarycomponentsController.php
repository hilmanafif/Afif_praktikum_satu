<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SalarycomponentService;
use App\Http\Requests\SalarycomponentRequest;

class SalarycomponentsController extends Controller
{
    public function __construct(SalarycomponentService $salarycomponentService)
    {
        $this->service = $salarycomponentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salarycomponents = $this->service->paginated();
        return view('salarycomponents.index')->with('salarycomponents', $salarycomponents);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $salarycomponents = $this->service->search($request->search);
        return view('salarycomponents.index')->with('salarycomponents', $salarycomponents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salarycomponents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SalarycomponentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalarycomponentRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('salarycomponents.index'))->with('message', 'Successfully created');
        }

        return redirect(route('salarycomponents.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the salarycomponents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salarycomponent = $this->service->find($id);
        return view('salarycomponents.show')->with('salarycomponent', $salarycomponent);
    }

    /**
     * Show the form for editing the salarycomponents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salarycomponent = $this->service->find($id);
        return view('salarycomponents.edit')->with('salarycomponent', $salarycomponent);
    }

    /**
     * Update the salarycomponents in storage.
     *
     * @param  \Illuminate\Http\SalarycomponentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalarycomponentRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('salarycomponents.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the salarycomponents from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('salarycomponents.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('salarycomponents.index'))->with('message', 'Failed to delete');
    }
}
