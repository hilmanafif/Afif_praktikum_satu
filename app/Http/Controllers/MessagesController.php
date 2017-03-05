<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MessageService;
use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;

class MessagesController extends Controller
{
    public function __construct(MessageService $messageService)
    {
        $this->service = $messageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = $this->service->paginated();
        return view('messages.index')->with('messages', $messages);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $messages = $this->service->search($request->search);
        return view('messages.index')->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MessageCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('messages.index'))->with('message', 'Successfully created');
            //return redirect(route('messages.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('messages.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->service->find($id);
        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->service->find($id);
        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the messages in storage.
     *
     * @param  \Illuminate\Http\MessageUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('messages.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the messages from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('messages.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('messages.index'))->with('message', 'Failed to delete');
    }
}
