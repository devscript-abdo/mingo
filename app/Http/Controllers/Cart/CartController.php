<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //

    public function index()
    {

       // $cartItemes = Cart::content();

        return view('theme.shopping-cart.index');
    }

    public function delete(Request $request)
    {
        //dd($request);
        Cart::remove($request->id);
    }
}
