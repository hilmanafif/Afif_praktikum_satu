<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PangkatService;
use App\Http\Requests\PangkatCreateRequest;
use App\Http\Requests\PangkatUpdateRequest;

class PangkatsController extends Controller
{
    public function __construct(PangkatService $pangkatService)
    {
        $this->service = $pangkatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pangkats = $this->service->paginated();
        return view('pangkats.index')->with('pangkats', $pangkats);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $pangkats = $this->service->search($request->search);
        return view('pangkats.index')->with('pangkats', $pangkats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pangkats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PangkatCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PangkatCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('pangkats.index'))->with('message', 'Successfully created');
            //return redirect(route('pangkats.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('pangkats.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the pangkat.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pangkat = $this->service->find($id);
        return view('pangkats.show')->with('pangkat', $pangkat);
    }

    /**
     * Show the form for editing the pangkat.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pangkat = $this->service->find($id);
        return view('pangkats.edit')->with('pangkat', $pangkat);
    }

    /**
     * Update the pangkats in storage.
     *
     * @param  \Illuminate\Http\PangkatUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PangkatUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('pangkats.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the pangkats from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('pangkats.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('pangkats.index'))->with('message', 'Failed to delete');
    }
}
