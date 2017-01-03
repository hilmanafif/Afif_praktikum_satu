<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LanguageService;
use App\Http\Requests\LanguageRequest;

class LanguagesController extends Controller
{
    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages = $this->service->paginated();
        return view('languages.index')->with('languages', $languages);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $languages = $this->service->search($request->search);
        return view('languages.index')->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('languages.index'))->with('message', 'Successfully created');
        }

        return redirect(route('languages.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the languages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = $this->service->find($id);
        return view('languages.show')->with('language', $language);
    }

    /**
     * Show the form for editing the languages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = $this->service->find($id);
        return view('languages.edit')->with('language', $language);
    }

    /**
     * Update the languages in storage.
     *
     * @param  \Illuminate\Http\LanguageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return redirect(route('languages.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the languages from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('languages.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('languages.index'))->with('message', 'Failed to delete');
    }
}
