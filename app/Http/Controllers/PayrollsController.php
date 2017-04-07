<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayrollService;
use App\Http\Requests\PayrollCreateRequest;
use App\Http\Requests\PayrollUpdateRequest;

class PayrollsController extends Controller
{
    public function __construct(PayrollService $payrollService)
    {
        $this->service = $payrollService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payrolls = $this->service->paginated();
        return view('payrolls.index')->with('payrolls', $payrolls);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $payrolls = $this->service->search($request->search);
        return view('payrolls.index')->with('payrolls', $payrolls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payrolls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PayrollCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayrollCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('payrolls.index'))->with('message', 'Successfully created');
            //return redirect(route('payrolls.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('payrolls.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the payroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payroll = $this->service->find($id);
        return view('payrolls.show')->with('payroll', $payroll);
    }

    /**
     * Show the form for editing the payroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payroll = $this->service->find($id);
        return view('payrolls.edit')->with('payroll', $payroll);
    }

    /**
     * Update the payrolls in storage.
     *
     * @param  \Illuminate\Http\PayrollUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PayrollUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('payrolls.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the payrolls from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('payrolls.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('payrolls.index'))->with('message', 'Failed to delete');
    }
}
