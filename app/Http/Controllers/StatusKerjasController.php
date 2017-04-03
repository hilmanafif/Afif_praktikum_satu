<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StatusKerjaService;
use App\Http\Requests\StatusKerjaCreateRequest;
use App\Http\Requests\StatusKerjaUpdateRequest;

class StatusKerjasController extends Controller
{
    public function __construct(StatusKerjaService $statuskerjaService)
    {
        $this->service = $statuskerjaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuskerjas = $this->service->paginated();
        return view('statuskerjas.index')->with('statuskerjas', $statuskerjas);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $statuskerjas = $this->service->search($request->search);
        return view('statuskerjas.index')->with('statuskerjas', $statuskerjas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuskerjas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StatusKerjaCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusKerjaCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('statuskerjas.index'))->with('message', 'Successfully created');
            //return redirect(route('statuskerjas.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('statuskerjas.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the statuskerja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statuskerja = $this->service->find($id);
        return view('statuskerjas.show')->with('statuskerja', $statuskerja);
    }

    /**
     * Show the form for editing the statuskerja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuskerja = $this->service->find($id);
        return view('statuskerjas.edit')->with('statuskerja', $statuskerja);
    }

    /**
     * Update the statuskerjas in storage.
     *
     * @param  \Illuminate\Http\StatusKerjaUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusKerjaUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('statuskerjas.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the statuskerjas from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('statuskerjas.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('statuskerjas.index'))->with('message', 'Failed to delete');
    }
}
