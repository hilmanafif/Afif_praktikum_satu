<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ContentService;
use App\Http\Requests\ContentRequest;

class ContentsController extends Controller
{
    public function __construct(ContentService $contentService)
    {
        $this->service = $contentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = $this->service->paginated();
        return view('contents.index')->with('contents', $contents);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $contents = $this->service->search($request->search);
        return view('contents.index')->with('contents', $contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('contents.index'))->with('message', 'Successfully created');
        }

        return redirect(route('contents.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the contents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = $this->service->find($id);
        return view('contents.show')->with('content', $content);
    }

    /**
     * Show the form for editing the contents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = $this->service->find($id);
        return view('contents.edit')->with('content', $content);
    }

    /**
     * Update the contents in storage.
     *
     * @param  \Illuminate\Http\ContentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('contents.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the contents from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('contents.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('contents.index'))->with('message', 'Failed to delete');
    }
}
