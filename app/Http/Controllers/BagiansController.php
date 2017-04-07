<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BagianService;
use App\Http\Requests\BagianCreateRequest;
use App\Http\Requests\BagianUpdateRequest;

class BagiansController extends Controller
{
    public function __construct(BagianService $bagianService)
    {
        $this->service = $bagianService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bagians = $this->service->paginated();
        return view('bagians.index')->with('bagians', $bagians);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $bagians = $this->service->search($request->search);
        return view('bagians.index')->with('bagians', $bagians);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bagians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BagianCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BagianCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('bagians.index'))->with('message', 'Successfully created');
            //return redirect(route('bagians.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('bagians.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the bagian.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bagian = $this->service->find($id);
        return view('bagians.show')->with('bagian', $bagian);
    }

    /**
     * Show the form for editing the bagian.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bagian = $this->service->find($id);
        return view('bagians.edit')->with('bagian', $bagian);
    }

    /**
     * Update the bagians in storage.
     *
     * @param  \Illuminate\Http\BagianUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BagianUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('bagians.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the bagians from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('bagians.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('bagians.index'))->with('message', 'Failed to delete');
    }
}
