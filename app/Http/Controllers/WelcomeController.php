<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;

class WelcomeController extends Controller
{
  public function index()
  {
    /* Take some CMS data */
    $contentcopywritings = Content::where('category_id','=',1)->get();
    $contenttechs = Content::where('category_id','=',2)->get();
    $contentfeatures = Content::where('category_id','=',3)->get();
    return view('welcome.index', compact('contentcopywritings','contenttechs','contentfeatures'));
  }
}
