<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $table ='articles';
    public $primaryKey = 'id_article';
    public $timestamps = true;

    protected $fillable = [
        'id_article',
        'title',
        'content',
        'picture',
        'position',
        'meta_description',
        'meta_keywords',
        'id_user',
        'id_category',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

   
    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','article_tag','id_article','id_tag');
       
    }


}
