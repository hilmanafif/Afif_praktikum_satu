<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BankAccountService;
use App\Http\Requests\BankAccountCreateRequest;
use App\Http\Requests\BankAccountUpdateRequest;

class BankAccountsController extends Controller
{
    public function __construct(BankAccountService $bankaccountService)
    {
        $this->service = $bankaccountService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bankaccounts = $this->service->paginated();
        return view('bankaccounts.index')->with('bankaccounts', $bankaccounts);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $bankaccounts = $this->service->search($request->search);
        return view('bankaccounts.index')->with('bankaccounts', $bankaccounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bankaccounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BankAccountCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('bankaccounts.index'))->with('message', 'Successfully created');
            //return redirect(route('bankaccounts.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('bankaccounts.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the bankaccount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankaccount = $this->service->find($id);
        return view('bankaccounts.show')->with('bankaccount', $bankaccount);
    }

    /**
     * Show the form for editing the bankaccount.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankaccount = $this->service->find($id);
        return view('bankaccounts.edit')->with('bankaccount', $bankaccount);
    }

    /**
     * Update the bankaccounts in storage.
     *
     * @param  \Illuminate\Http\BankAccountUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            //return back()->with('message', 'Successfully updated');
            return redirect(route('bankaccounts.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the bankaccounts from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('bankaccounts.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('bankaccounts.index'))->with('message', 'Failed to delete');
    }
}
