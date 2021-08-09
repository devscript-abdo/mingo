<?php

namespace App\Http\Resources\Brand;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{

    public static $wrap = 'payload';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //  return parent::toArray($request);

        return [
            'id' => $this->id,
            'image' => $this->photo,
            'name' => $this->name
        ];
    }
}
