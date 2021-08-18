<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{

    public static $wrap = 'payload';

    /*public $order;

    public $products;

    public function __construct($products, $order)
    {
        $this->order = $order;

        $this->products = $products;
    }*/

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        /* dd($this->order->billing_subtotal, '---*---', $this->order->products->map(function ($item) {
            return $item->name;
        }));*/
        //  dd($this->orders);
        return [
            'id' => $this->orders[0]->id,
            'order_id' => $this->orders[0]->id,
            'product_id' => $this->id,
            'seller_id' => 1,
            'product_details' => new ProductResource($this),

            'qty' => $this->pivot->quantity,
            'price' => $this->pivot->quantity * $this->price,
            'discount' => $this->orders[0]->billing_discount_code,
            'delivery_status' => $this->orders[0]->delivery_status,
            'payment_status' => $this->orders[0]->is_payed,
            'shipping_method_id' => 1,
            'created_at' => $this->orders[0]->created_at->format('Y-m-d'),
        ];
    }
}
