<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        
        return [
            'id_article' => $this->id_article,
            'title' => $this->title,
            'content' => $this->content,
            'updated_at' => $this->updated_at,
            'category'=>$this->shit(),
            //'user'=>$this->user(),
        ];
        
    }
}
