<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Logsystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;

class CompaniesController extends Controller
{
    public function __construct(CompanyService $companyService)
    {
        $this->service = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = $this->service->paginated();
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $companies = $this->service->search($request->search);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('companies.index'))->with('message', 'Successfully created');
        }

        return redirect(route('companies.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the companies.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->service->find($id);
        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the companies.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->service->find($id);
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the companies in storage.
     *
     * @param  \Illuminate\Http\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
          $user_id = Auth::user()->id;
          $ipaddress = $request->ip();
          Logsystem::create(['name' => 'is updating General Info', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
          return redirect('companies/'.$id.'/edit')->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the companies from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('companies.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('companies.index'))->with('message', 'Failed to delete');
    }
}
