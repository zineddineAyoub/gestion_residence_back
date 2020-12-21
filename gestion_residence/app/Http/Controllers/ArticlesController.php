<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Http\Resources\ArticleResourceCollection;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
class ArticlesController extends Controller
{
    private $var;
    //
    public function __construct()
    {
      //  $this->middleware('auth',['except'=>['index','show']]);
      // PUT INDEX HERE v
      $this->middleware('auth:api', ['except' => ['index','show','search']]);
    }

    public function store(Request $request)
    {
      /*  foreach ( json_decode($request->all()["tags"], true) as $key) {
            return $key;
        }
      return  json_decode($request->all()["tags"], true);*/
        $requestAll = $request->all();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'id_user'=>'required',
            'id_category' =>'required',
            
        ]);
        
        //$data =  $request->all();
        //$tags = $data['tags'];
        //unset($data['tags']);
        if($request->hasFile('picture'))
        {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('picture')->storeAs('public/article_images',$fileNameToStore);
            $requestAll['picture'] = $fileNameToStore;
        }
        
        $article = Article::create($requestAll);

        $request["id_article"] = $article["id_article"];
        if($request->all()["tags"]!="[]")
        {
            return (new TagsController)->store($request);
        }
        return $article;

    }

    public function index() 
    {
     /*  $article=  DB::table('articles')
       ->join('users','users.id_user','=','articles.id_user')
       ->join('categories','categories.id_category','=','articles.id_category')
       ->select('articles.*', 'users.first_name','users.last_name', 'categories.name_category')
       ->get();*/

       $articles = Article::orderByDesc('created_at')->get();
       
        foreach($articles as $article)
        {
            foreach($article->tags as $tag){ }
            $article->user;
            $article->category;
        }
      

       return $articles;
  }

    public function update(Article $article, Request $request)
    { 
        $requestAll = $request->all();
        
        if($request->hasFile('picture'))
        {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('picture')->storeAs('public/article_images',$fileNameToStore);
            $requestAll['picture'] = $fileNameToStore;
        }

        $article->update($requestAll);
        $ids =  (new TagsController)->update($request);
        $article->tags()->sync($ids);
        

       
        return $article;
    }

    public function destroy(Article $article)
    {
       $article->tags()->detach();
       $article->delete();  
        return "Deleted ! ";
    }


    public function show(Article $article)
    {
        $article->tags;
        $article->category;
        return $article;
    }
    

    public function search($tag)
    {
     $this->var = $tag;
        
       $posts = Article::whereHas('tags',function (Builder $query)
       { 
           $query->where('name_tag','like',$this->var);
       })->get();

       return $posts;
      //  return $tags = Tag::where('name_tag',$request->name_tag)->get();
    }

}
