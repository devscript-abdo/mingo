<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Elmarzouguidev\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index()
    {
        if (Cart::content()->count()) {
            session()->put('cartUrl', route('shoppingcart'));
        } else {
            session()->forget('cartUrl');
        }

        return view('theme.shopping-cart.index');
    }

    public function delete(Request $request)
    {
        //dd($request);
        Cart::remove($request->id);
    }
}
