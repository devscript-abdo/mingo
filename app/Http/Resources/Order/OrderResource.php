<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'payment_status' => $this->is_payed,
            'payment_method' => $this->payment_gateway,
            'order_amount' => str_replace(',','.',$this->billing_total),
            'shipping_address' => $this->billing_address,
            'discount_amount' => $this->billing_discount,
            'discount_type' => $this->name,
            'created_at' => $this->created_at,
            'order_status' => $this->status,
        ];
    }
}
