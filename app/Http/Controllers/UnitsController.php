<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UnitService;
use App\Http\Requests\UnitCreateRequest;
use App\Http\Requests\UnitUpdateRequest;

class UnitsController extends Controller
{
    public function __construct(UnitService $unitService)
    {
        $this->service = $unitService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = $this->service->paginated();
        return view('units.index')->with('units', $units);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $units = $this->service->search($request->search);
        return view('units.index')->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UnitCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('units.index'))->with('message', 'Successfully created');
            //return redirect(route('units.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('units.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the unit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = $this->service->find($id);
        return view('units.show')->with('unit', $unit);
    }

    /**
     * Show the form for editing the unit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = $this->service->find($id);
        return view('units.edit')->with('unit', $unit);
    }

    /**
     * Update the units in storage.
     *
     * @param  \Illuminate\Http\UnitUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('units.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the units from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('units.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('units.index'))->with('message', 'Failed to delete');
    }
}
