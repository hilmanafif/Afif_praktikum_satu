<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WilayahService;
use App\Http\Requests\WilayahCreateRequest;
use App\Http\Requests\WilayahUpdateRequest;

class WilayahsController extends Controller
{
    public function __construct(WilayahService $wilayahService)
    {
        $this->service = $wilayahService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wilayahs = $this->service->paginated();
        return view('wilayahs.index')->with('wilayahs', $wilayahs);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $wilayahs = $this->service->search($request->search);
        return view('wilayahs.index')->with('wilayahs', $wilayahs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wilayahs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\WilayahCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WilayahCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('wilayahs.index'))->with('message', 'Successfully created');
            //return redirect(route('wilayahs.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('wilayahs.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the wilayah.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wilayah = $this->service->find($id);
        return view('wilayahs.show')->with('wilayah', $wilayah);
    }

    /**
     * Show the form for editing the wilayah.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wilayah = $this->service->find($id);
        return view('wilayahs.edit')->with('wilayah', $wilayah);
    }

    /**
     * Update the wilayahs in storage.
     *
     * @param  \Illuminate\Http\WilayahUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WilayahUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('wilayahs.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the wilayahs from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('wilayahs.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('wilayahs.index'))->with('message', 'Failed to delete');
    }
}
