<?php

namespace App\Http\Resources\Ads;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'photo' => $this->photo,
            'url' => $this->url,
        ];
    }
}
