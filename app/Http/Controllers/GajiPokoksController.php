<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GajiPokokService;
use App\Http\Requests\GajiPokokCreateRequest;
use App\Http\Requests\GajiPokokUpdateRequest;

class GajiPokoksController extends Controller
{
    public function __construct(GajiPokokService $gajipokokService)
    {
        $this->service = $gajipokokService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gajipokoks = $this->service->paginated();
        return view('gajipokoks.index')->with('gajipokoks', $gajipokoks);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $gajipokoks = $this->service->search($request->search);
        return view('gajipokoks.index')->with('gajipokoks', $gajipokoks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gajipokoks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\GajiPokokCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GajiPokokCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('gajipokoks.index'))->with('message', 'Successfully created');
            //return redirect(route('gajipokoks.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('gajipokoks.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the gajipokok.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gajipokok = $this->service->find($id);
        return view('gajipokoks.show')->with('gajipokok', $gajipokok);
    }

    /**
     * Show the form for editing the gajipokok.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gajipokok = $this->service->find($id);
        return view('gajipokoks.edit')->with('gajipokok', $gajipokok);
    }

    /**
     * Update the gajipokoks in storage.
     *
     * @param  \Illuminate\Http\GajiPokokUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GajiPokokUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('gajipokoks.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the gajipokoks from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('gajipokoks.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('gajipokoks.index'))->with('message', 'Failed to delete');
    }
}
