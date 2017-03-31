<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AgamaService;
use App\Http\Requests\AgamaCreateRequest;
use App\Http\Requests\AgamaUpdateRequest;

class AgamasController extends Controller
{
    public function __construct(AgamaService $agamaService)
    {
        $this->service = $agamaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agamas = $this->service->paginated();
        return view('agamas.index')->with('agamas', $agamas);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $agamas = $this->service->search($request->search);
        return view('agamas.index')->with('agamas', $agamas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agamas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AgamaCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgamaCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('agamas.index'))->with('message', 'Successfully created');
            //return redirect(route('agamas.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('agamas.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the agama.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = $this->service->find($id);
        return view('agamas.show')->with('agama', $agama);
    }

    /**
     * Show the form for editing the agama.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agama = $this->service->find($id);
        return view('agamas.edit')->with('agama', $agama);
    }

    /**
     * Update the agamas in storage.
     *
     * @param  \Illuminate\Http\AgamaUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgamaUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('agamas.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the agamas from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('agamas.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('agamas.index'))->with('message', 'Failed to delete');
    }
}
