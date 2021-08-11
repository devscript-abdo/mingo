<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index()
    {
        
        if (Cart::instance('default')->count() == 0) {

            return redirect()->route('products');
        }
        if (auth()->guard('customer')->check() && request()->routeIs('checkout.guest')) {

            return redirect()->route('checkout');
        }

        $itemes = Cart::content();
        $totalPrice = Cart::priceTotal();
        $subTotal = Cart::subtotal();

        return view('theme.checkout.index', compact('itemes', 'totalPrice', 'subTotal'));
    }

    public function store(CheckoutRequest $request)
    {

        /* $contents = Cart::content()->map(function ($item) {
            return $item->options->url . ', ' . $item->qty;
        })->values()->toJson();*/

        $order = $this->addToOrdersTables($request, null);

        if ($order) {

           // Cart::instance('default')->destroy();

            return redirect()->route('checkout.payment');
        }
        return redirect()->route('checkout.thankyou')->with('success_message', 'Merci pour votre Command');
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'customer_id' => auth()->guard('customer')->user()->id ??  null,
            'billing_email' => $request->billing_email,
            'billing_name' => $request->billing_name,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_province' => $request->billing_province,
            'billing_postalcode' => $request->billing_postalcode,
            'billing_phone' => $request->billing_phone,
            'billing_name_on_card' => $request->billing_name,
            'billing_discount' => 0,
            'billing_discount_code' => 'coupon',
            'billing_subtotal' => Cart::subtotal(),
            'billing_tax' => 0,
            'billing_total' => Cart::priceTotal(),
            'payment_gateway'=>'COD',
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }
}
