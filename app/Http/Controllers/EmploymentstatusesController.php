<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmploymentstatusService;
use App\Http\Requests\EmploymentstatusRequest;

class EmploymentstatusesController extends Controller
{
    public function __construct(EmploymentstatusService $employmentstatusService)
    {
        $this->service = $employmentstatusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employmentstatuses = $this->service->paginated();
        return view('employmentstatuses.index')->with('employmentstatuses', $employmentstatuses);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $employmentstatuses = $this->service->search($request->search);
        return view('employmentstatuses.index')->with('employmentstatuses', $employmentstatuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employmentstatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EmploymentstatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploymentstatusRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('employmentstatuses.index'))->with('message', 'Successfully created');
        }

        return redirect(route('employmentstatuses.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the employmentstatuses.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employmentstatus = $this->service->find($id);
        return view('employmentstatuses.show')->with('employmentstatus', $employmentstatus);
    }

    /**
     * Show the form for editing the employmentstatuses.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employmentstatus = $this->service->find($id);
        return view('employmentstatuses.edit')->with('employmentstatus', $employmentstatus);
    }

    /**
     * Update the employmentstatuses in storage.
     *
     * @param  \Illuminate\Http\EmploymentstatusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmploymentstatusRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('employmentstatuses.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the employmentstatuses from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('employmentstatuses.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('employmentstatuses.index'))->with('message', 'Failed to delete');
    }
}
