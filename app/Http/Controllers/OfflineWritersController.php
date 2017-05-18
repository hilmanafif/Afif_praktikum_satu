<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OfflinewriterService;
use App\Http\Requests\OfflinewriterRequest;

class OfflinewritersController extends Controller
{
    public function __construct(OfflinewriterService $offlinewriterService)
    {
        $this->service = $offlinewriterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offlinewriters = $this->service->paginated();
        return view('offlinewriters.index')->with('offlinewriters', $offlinewriters);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $offlinewriters = $this->service->search($request->search);
        return view('offlinewriters.index')->with('offlinewriters', $offlinewriters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offlinewriters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\OfflineWriterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfflinewriterRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('offlinewriters.index'))->with('message', 'Successfully created');
        }

        return redirect(route('offlinewriters.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the offlinewriters.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offlinewriter = $this->service->find($id);
        return view('offlinewriters.show')->with('offlinewriter', $offlinewriter);
    }

    /**
     * Show the form for editing the offlinewriters.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offlinewriter = $this->service->find($id);
        return view('offlinewriters.edit')->with('offlinewriter', $offlinewriter);
    }

    /**
     * Update the offlinewriters in storage.
     *
     * @param  \Illuminate\Http\OfflineWriterRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfflinewriterRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('offlinewriters.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the offlinewriters from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('offlinewriters.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('offlinewriters.index'))->with('message', 'Failed to delete');
    }
}
