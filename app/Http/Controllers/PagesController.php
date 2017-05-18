<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class PagesController extends Controller
{

    /**
     * Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
         return view('dashboard.main', compact('user'));
         //return view('dashboard.main')->with('user', $user);
    }
}
