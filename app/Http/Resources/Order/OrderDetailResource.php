<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'order_id' => $this->id,
            'product_id' =>1,
            'seller_id' => $this->payment_gateway,
            'product_details' => ProductResource::collection($this->products),
            'qty' => $this->products_all,
            'price' => $this->billing_discount,
            'discount' => $this->name,
            'delivery_status' => $this->created_at,
            'order_status' => $this->status,
            'payment_status' => $this->is_payed,
            'shipping_method_id' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
