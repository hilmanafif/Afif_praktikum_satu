<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TimezoneService;
use App\Http\Requests\TimezoneRequest;

class TimezonesController extends Controller
{
    public function __construct(TimezoneService $timezoneService)
    {
        $this->service = $timezoneService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $timezones = $this->service->paginated();
        return view('timezones.index')->with('timezones', $timezones);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $timezones = $this->service->search($request->search);
        return view('timezones.index')->with('timezones', $timezones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timezones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TimezoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimezoneRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('timezones.index'))->with('message', 'Successfully created');
        }

        return redirect(route('timezones.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the timezones.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timezone = $this->service->find($id);
        return view('timezones.show')->with('timezone', $timezone);
    }

    /**
     * Show the form for editing the timezones.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timezone = $this->service->find($id);
        return view('timezones.edit')->with('timezone', $timezone);
    }

    /**
     * Update the timezones in storage.
     *
     * @param  \Illuminate\Http\TimezoneRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimezoneRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('timezones.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the timezones from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('timezones.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('timezones.index'))->with('message', 'Failed to delete');
    }
}
