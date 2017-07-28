<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TupelService;
use App\Http\Requests\TupelCreateRequest;
use App\Http\Requests\TupelUpdateRequest;

class TupelsController extends Controller
{
    public function __construct(TupelService $tupelService)
    {
        $this->service = $tupelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tupels = $this->service->paginated();
        return view('tupels.index')->with('tupels', $tupels);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $tupels = $this->service->search($request->search);
        return view('tupels.index')->with('tupels', $tupels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tupels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TupelCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TupelCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('tupels.index'))->with('message', 'Successfully created');
            //return redirect(route('tupels.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('tupels.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the tupel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tupel = $this->service->find($id);
        return view('tupels.show')->with('tupel', $tupel);
    }

    /**
     * Show the form for editing the tupel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tupel = $this->service->find($id);
        return view('tupels.edit')->with('tupel', $tupel);
    }

    /**
     * Update the tupels in storage.
     *
     * @param  \Illuminate\Http\TupelUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TupelUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('tupels.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the tupels from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('tupels.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('tupels.index'))->with('message', 'Failed to delete');
    }
}
