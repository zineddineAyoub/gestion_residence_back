<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
      return DB::table('tags')->get();
    }

    public function store(Request $request)
    {
  
    foreach (json_decode($request->all()["tags"], true) as $key) {

      $tag = Tag::firstOrCreate(['name_tag'=>$key['name_tag']]);
      $tag->articles()->attach($request->all()["id_article"]);
     
     }

     return $tag;
      $msg["msg"]="success";
      return $msg;
    }

    public function update(Request $request)
    {
      $i=0;
      $ids = array();
      
      foreach (json_decode($request->all()["tags"], true) as $key) {

        $tag = Tag::firstOrCreate(['name_tag'=>$key['name_tag']]);
       // $tag->articles()->attach($request->all()["id_article"]);
        $ids[$i] = $tag['id_tag'];
        $i++;
       }

       return $ids;
    }

    
}
