<?php

namespace App\Http\Resources\Addresse;

use Illuminate\Http\Resources\Json\JsonResource;

class AddresseResource extends JsonResource
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
            'addressType' => $this->country,
            'address' => $this->addresse,
            'city' => $this->city,
            'zip' => '122500',
        ];
    }
}
