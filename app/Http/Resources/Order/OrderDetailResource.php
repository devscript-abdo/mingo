<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{

    public static $wrap = null;

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
                'product_id' =>$product->id,
                'seller_id' => 1,
                'product_details' => ProductResource::collection($this->products),

                'qty' => $this->products_all,
                'price' =>$this->products_all * $product->price,
                'discount' => $this->billing_discount_code,
                'delivery_status' => $this->delivery_status,
                'payment_status' => $this->is_payed,
                'shipping_method_id' => 1,
                'created_at' => $this->created_at->format('Y-m-d'),
            ];
        
    }
}
