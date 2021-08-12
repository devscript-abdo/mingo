<?php

namespace App\Http\Resources\Wishlist;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
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
        //'customerId'=>$this->customer_id,
        'products' => $this->products,
        //'photo' => $this->photo,
    ];
    }
}
