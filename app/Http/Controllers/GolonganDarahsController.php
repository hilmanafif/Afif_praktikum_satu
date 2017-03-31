<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GolonganDarahService;
use App\Http\Requests\GolonganDarahCreateRequest;
use App\Http\Requests\GolonganDarahUpdateRequest;

class GolonganDarahsController extends Controller
{
    public function __construct(GolonganDarahService $golongandarahService)
    {
        $this->service = $golongandarahService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $golongandarahs = $this->service->paginated();
        return view('golongandarahs.index')->with('golongandarahs', $golongandarahs);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $golongandarahs = $this->service->search($request->search);
        return view('golongandarahs.index')->with('golongandarahs', $golongandarahs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongandarahs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\GolonganDarahCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GolonganDarahCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('golongandarahs.index'))->with('message', 'Successfully created');
            //return redirect(route('golongandarahs.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('golongandarahs.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the golongandarah.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $golongandarah = $this->service->find($id);
        return view('golongandarahs.show')->with('golongandarah', $golongandarah);
    }

    /**
     * Show the form for editing the golongandarah.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $golongandarah = $this->service->find($id);
        return view('golongandarahs.edit')->with('golongandarah', $golongandarah);
    }

    /**
     * Update the golongandarahs in storage.
     *
     * @param  \Illuminate\Http\GolonganDarahUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GolonganDarahUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('golongandarahs.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the golongandarahs from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('golongandarahs.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('golongandarahs.index'))->with('message', 'Failed to delete');
    }
}
