<?php

namespace App\Http\Controllers\API\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Checkout\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function  index()
    {
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();

        if (auth('sanctum')->check()) {
            $order = $this->CreateOrderAuth($data, null);
        }
        if (array_key_exists('customer_info_perso', $data) &&  count($data['customer_info_perso'])) {
            $order = $this->CreateOrderGuest($data, null);
        }

        if ($order) {

            return response()->json(
                [

                    '_response' => ['msg' => 'successfully Created Order']
                ],
                200
            );
        }
    }

    protected function CreateOrderAuth($data, $error)
    {

        $totalPrice = collect($data['cart'])->map(function($item){
            return $item['price'] * $item['quantity'];
        })->sum();
       
        $order = Order::forceCreate([
            'user_type' => 'mingo-mobile',

            'customer_id' => auth('sanctum')->user()->id ??  null,

            'billing_email' => auth('sanctum')->user()->email ?? 'app_mobile@mingo.ma',
            'billing_name' => auth('sanctum')->user()->name,

            'billing_address' => $data['customer_info']['shipping_address'],
            'billing_city' => $data['customer_info']['shipping_address'],
            'billing_province' => $data['customer_info']['shipping_address'],
            'billing_postalcode' => "2000",
            'billing_phone' => auth('sanctum')->user()->phone ?? '0660405003',
            'billing_name_on_card' => auth('sanctum')->user()->name,
            'billing_discount' => $data['discount'],
            'billing_discount_code' => 'coupon',
            'billing_subtotal' =>  $totalPrice,
            'billing_tax' => "550",
            'billing_total' =>  $totalPrice,
            'payment_gateway' => 'COD',
            'error' => $error,
            //dd('rrrr','last'),
        ]);

        // Insert into order_product table
        foreach ($data['cart'] as $item) {

            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return $order;
    }

    protected function CreateOrderGuest($data, $error)
    {

        $totalPrice = collect($data['cart'])->map(function($item){
            return $item['price'] * $item['quantity'];
        })->sum();
       
      
        $order = Order::forceCreate([

            'user_type' => 'mingo-mobile',

            'customer_id' =>  null,

            'billing_email' => $data['customer_info_perso']['email'],
            'billing_name' => $data['customer_info_perso']['name'],

            'billing_address' => $data['customer_info']['shipping_address'],
            'billing_city' => $data['customer_info']['shipping_address'],
            'billing_province' => $data['customer_info']['shipping_address'],
            'billing_postalcode' => "2000",
            'billing_phone' => $data['customer_info_perso']['phone'],
            'billing_name_on_card' => $data['customer_info_perso']['name'],
            'billing_discount' => $data['discount'],
            'billing_discount_code' => 'coupon',
            'billing_subtotal' =>  $totalPrice,
            'billing_tax' => "550",
            'billing_total' => $totalPrice,
            'payment_gateway' => 'COD',
            'error' => $error,
            //dd('rrrr','last'),
        ]);

        // Insert into order_product table
        foreach ($data['cart'] as $item) {

            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return $order;
    }
}
