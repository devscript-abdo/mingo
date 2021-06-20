<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function store(CouponRequest $request)
    {

        $coupon = Coupon::whereCode($request->coupon_code)->first();

        if (!$coupon) {
            return redirect()->back()->with('message', 'invalid coupon code try again');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::priceTotal())
        ]);

        return redirect()->back()->with('message', 'Coupon has been applied');
    }

    public function delete()
    {
        if(session()->has('coupon'))
        {
            session()->forget('coupon');

            return redirect()->back()->with('message', 'Coupon has been Deleted');
        }
    }
}
