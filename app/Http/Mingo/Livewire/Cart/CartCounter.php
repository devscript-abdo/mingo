<?php

namespace App\Http\Mingo\Livewire\Cart;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounter extends Component
{

    protected $listeners = ['cart_updated'=>'render'];

    public function render()
    {
        $cartItemes = Cart::content();
        $totalPrice = Cart::priceTotal();
        $subTotal = Cart::subtotal();

        return view('livewire.cart.cart-counter', compact('cartItemes','totalPrice','subTotal'));
    }
}
