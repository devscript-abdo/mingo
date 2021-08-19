<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $lng = explode('/', $request->route()->action['prefix']);

        return [
            'page_id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->field('title', $lng[1]),
            'body' => strip_tags($this->field('body', $lng[1])),
            'image' => $this->photo,
        
        ];
    }
}
