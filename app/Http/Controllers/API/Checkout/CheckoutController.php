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

        $order = $this->addToOrdersTable($data, null);

        if ($order) {

            return response()->json(
                [

                    '_response' => ['msg' => 'successfully Created Order']
                ],
                200
            );
        }
    }

    protected function addToOrdersTable($data, $error)
    {

        $totalPrice = collect($data['cart'])->sum('price');

        $order = Order::forceCreate([
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
            'billing_subtotal' => $totalPrice,
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
