<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth',['except'=>['index','show']]);
     // $this->middleware('auth:api', ['except' => ['login']]);
     $this->middleware('auth:api', ['except' => ['login']]);
    }

    //
    public function index()
    {
        return DB::table('categories')->get();
    }
}
