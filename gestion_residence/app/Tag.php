<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table ='tags';
    public $primaryKey = 'id_tag';
    public $timestamps = true;

    protected $fillable = [
        'id_tag',
        'name_tag',
        'created_at',
        'updated_at'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article','article_tag','id_tag','id_article');
    }

}
