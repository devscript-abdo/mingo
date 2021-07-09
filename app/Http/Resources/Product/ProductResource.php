<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public static $wrap = 'payload';
    /**
     * 
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        //return parent::toArray($request);
       // dd($request->route()->action);
        $lng = explode('/', $request->route()->action['prefix']);

        return [

            'id' => $this->id,
            'name' => $this->field('name', $lng[1]),
            'price'=>$this->price,
            'picture'=>$this->photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'category' => new CategoryResource($this->category),
            'category' => $this->category,
        ];
    }
}
