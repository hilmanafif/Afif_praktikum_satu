<?php

namespace App\Http\Controllers;
use Auth;
use Gate;
use App\Models\Logsystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;

class DepartmentsController extends Controller
{
    public function __construct(DepartmentService $departmentService)
    {
        $this->service = $departmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = $this->service->paginated();
        return view('departments.index')->with('departments', $departments);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $departments = $this->service->search($request->search);
        return view('departments.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->except('_token');
        $data['company_id'] = 1;  // Default company_id for non SaaS
        $result = $this->service->create($data);

        if ($result) {
            $user_id = Auth::user()->id;
            $ipaddress = $request->ip();
            Logsystem::create(['name' => 'is creating new Department', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
            return redirect(route('departments.index'))->with('message', 'Successfully created');
        }

        return redirect(route('departments.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the departments.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = $this->service->find($id);
        return view('departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the departments.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = $this->service->find($id);
        return view('departments.edit')->with('department', $department);
    }

    /**
     * Update the departments in storage.
     *
     * @param  \Illuminate\Http\DepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            $user_id = Auth::user()->id;
            $ipaddress = $request->ip();
            Logsystem::create(['name' => 'is updating Department', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
            return redirect(route('departments.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the departments from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            $user_id = Auth::user()->id;
            $ipaddress = $request->ip();
            Logsystem::create(['name' => 'is deleting Department', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
            return redirect(route('departments.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('departments.index'))->with('message', 'Failed to delete');
    }
}
