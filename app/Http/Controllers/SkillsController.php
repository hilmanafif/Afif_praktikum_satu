<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SkillService;
use App\Http\Requests\SkillRequest;

class SkillsController extends Controller
{
    public function __construct(SkillService $skillService)
    {
        $this->service = $skillService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skills = $this->service->paginated();
        return view('skills.index')->with('skills', $skills);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $skills = $this->service->search($request->search);
        return view('skills.index')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('skills.index'))->with('message', 'Successfully created');
        }

        return redirect(route('skills.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the skills.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->service->find($id);
        return view('skills.show')->with('skill', $skill);
    }

    /**
     * Show the form for editing the skills.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = $this->service->find($id);
        return view('skills.edit')->with('skill', $skill);
    }

    /**
     * Update the skills in storage.
     *
     * @param  \Illuminate\Http\SkillRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('skills.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the skills from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('skills.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('skills.index'))->with('message', 'Failed to delete');
    }
}
