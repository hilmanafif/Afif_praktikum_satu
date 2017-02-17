<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TopicService;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct(TopicService $topicService)
    {
        $this->service = $topicService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topics = $this->service->paginated();
        return view('topics.index')->with('topics', $topics);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $topics = $this->service->search($request->search);
        return view('topics.index')->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('topics.index'))->with('message', 'Successfully created');
        }

        return redirect(route('topics.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the topics.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = $this->service->find($id);
        return view('topics.show')->with('topic', $topic);
    }

    /**
     * Show the form for editing the topics.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = $this->service->find($id);
        return view('topics.edit')->with('topic', $topic);
    }

    /**
     * Update the topics in storage.
     *
     * @param  \Illuminate\Http\TopicRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('topics.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the topics from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('topics.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('topics.index'))->with('message', 'Failed to delete');
    }
}
