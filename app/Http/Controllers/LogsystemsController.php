<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LogsystemService;
use App\Http\Requests\LogsystemRequest;

class LogsystemsController extends Controller
{
    public function __construct(LogsystemService $logsystemService)
    {
        $this->service = $logsystemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logsystems = $this->service->paginated();
        return view('logsystems.index')->with('logsystems', $logsystems);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $logsystems = $this->service->search($request->search);
        return view('logsystems.index')->with('logsystems', $logsystems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logsystems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LogsystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogsystemRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('logsystems.index'))->with('message', 'Successfully created');
        }

        return redirect(route('logsystems.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the logsystems.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logsystem = $this->service->find($id);
        return view('logsystems.show')->with('logsystem', $logsystem);
    }

    /**
     * Show the form for editing the logsystems.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logsystem = $this->service->find($id);
        return view('logsystems.edit')->with('logsystem', $logsystem);
    }

    /**
     * Update the logsystems in storage.
     *
     * @param  \Illuminate\Http\LogsystemRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogsystemRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('logsystems.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the logsystems from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('logsystems.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('logsystems.index'))->with('message', 'Failed to delete');
    }
}
