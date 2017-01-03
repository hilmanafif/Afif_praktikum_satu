<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EducationService;
use App\Http\Requests\EducationRequest;

class EducationsController extends Controller
{
    public function __construct(EducationService $educationService)
    {
        $this->service = $educationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $educations = $this->service->paginated();
        return view('educations.index')->with('educations', $educations);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $educations = $this->service->search($request->search);
        return view('educations.index')->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('educations.index'))->with('message', 'Successfully created');
        }

        return redirect(route('educations.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the education.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = $this->service->find($id);
        return view('educations.show')->with('education', $education);
    }

    /**
     * Show the form for editing the education.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = $this->service->find($id);
        return view('educations.edit')->with('education', $education);
    }

    /**
     * Update the education in storage.
     *
     * @param  \Illuminate\Http\EducationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('educations.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the education from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('educations.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('educations.index'))->with('message', 'Failed to delete');
    }
}
