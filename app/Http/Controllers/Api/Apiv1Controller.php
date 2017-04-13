<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Department;
use App\Models\User;

class Apiv1Controller extends Controller
{
  public function __construct() {
    $this->middleware('jwt.auth',['except'=>['listuser']]);
  }

  public function listdepartment()
  {
    $departments = Department::all();
    return $departments;
  }

  public function listuser()
  {
    $users = User::all();
    return $users;
  }

}
