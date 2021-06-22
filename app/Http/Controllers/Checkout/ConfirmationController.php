<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    //

    public function index()
    {
        /*if (!session()->has('success_message')) {

            return redirect()->route('home');
        }*/
        $order = Order::latest('id')
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->firstOrFail()->slug;
        return view('theme.checkout.thankyou.index', compact('order'));
    }
}
