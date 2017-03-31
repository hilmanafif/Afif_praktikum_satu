<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StatusPerkawinanService;
use App\Http\Requests\StatusPerkawinanCreateRequest;
use App\Http\Requests\StatusPerkawinanUpdateRequest;

class StatusPerkawinansController extends Controller
{
    public function __construct(StatusPerkawinanService $statusperkawinanService)
    {
        $this->service = $statusperkawinanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusperkawinans = $this->service->paginated();
        return view('statusperkawinans.index')->with('statusperkawinans', $statusperkawinans);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $statusperkawinans = $this->service->search($request->search);
        return view('statusperkawinans.index')->with('statusperkawinans', $statusperkawinans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusperkawinans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StatusPerkawinanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusPerkawinanCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('statusperkawinans.index'))->with('message', 'Successfully created');
            //return redirect(route('statusperkawinans.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('statusperkawinans.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the statusperkawinan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusperkawinan = $this->service->find($id);
        return view('statusperkawinans.show')->with('statusperkawinan', $statusperkawinan);
    }

    /**
     * Show the form for editing the statusperkawinan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusperkawinan = $this->service->find($id);
        return view('statusperkawinans.edit')->with('statusperkawinan', $statusperkawinan);
    }

    /**
     * Update the statusperkawinans in storage.
     *
     * @param  \Illuminate\Http\StatusPerkawinanUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusPerkawinanUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('statusperkawinans.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the statusperkawinans from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('statusperkawinans.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('statusperkawinans.index'))->with('message', 'Failed to delete');
    }
}
