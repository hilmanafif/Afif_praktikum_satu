<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function index()
  {
      $welcome_msg = "Selamat Datang!";
      return view('welcome.index')->with('welcome_msg', $welcome_msg);
  }
}
