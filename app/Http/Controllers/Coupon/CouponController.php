<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponController extends Controller
{
    //

    public function store(CouponRequest $request)
    {

        // dd('OOOO');
        $coupon = Coupon::whereCode($request->coupon_code)->first();

        if (! $coupon) {
            return redirect()->back()->with('message', 'invalid coupon code try again');
        }
        $subTotal = (int) str_replace('.', '', str_replace(',', '.', substr(Cart::priceTotal(), 0, -3)));
        session()->put('coupon', [
            'name' => $coupon->code,
            'type' => $coupon->type,
            'discount' => $coupon->discount($subTotal),
        ]);

        return redirect()->back()->with('message', 'Coupon has been applied');
    }

    public function delete()
    {
        if (session()->has('coupon')) {
            session()->forget('coupon');

            return redirect()->back()->with('message', 'Coupon has been Deleted');
        }
    }
}
