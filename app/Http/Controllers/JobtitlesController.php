<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\JobtitleService;
use App\Http\Requests\JobtitleRequest;

class JobtitlesController extends Controller
{
    public function __construct(JobtitleService $jobtitleService)
    {
        $this->service = $jobtitleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobtitles = $this->service->paginated();
        return view('jobtitles.index')->with('jobtitles', $jobtitles);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $jobtitles = $this->service->search($request->search);
        return view('jobtitles.index')->with('jobtitles', $jobtitles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobtitles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\JobtitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobtitleRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('jobtitles.index'))->with('message', 'Successfully created');
        }

        return redirect(route('jobtitles.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the jobtitles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobtitle = $this->service->find($id);
        return view('jobtitles.show')->with('jobtitle', $jobtitle);
    }

    /**
     * Show the form for editing the jobtitles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobtitle = $this->service->find($id);
        return view('jobtitles.edit')->with('jobtitle', $jobtitle);
    }

    /**
     * Update the jobtitles in storage.
     *
     * @param  \Illuminate\Http\JobtitleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobtitleRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('jobtitles.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the jobtitles from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('jobtitles.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('jobtitles.index'))->with('message', 'Failed to delete');
    }
}
