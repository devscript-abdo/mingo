<?php

namespace App\Http\Mingo\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as MyCart;

class Cart extends Component
{

    public $cartItemess;

    public array $quantity = [];

    public function mount()
    {
        $this->cartItemess = MyCart::content();

        foreach ($this->cartItemess as $item) {
            $this->quantity[$item->id] = $item->qty;
        }
    }

    public function render()
    {
        $cartItemes = MyCart::content();

        return view('livewire.cart.cart', compact('cartItemes'));
    }

    public function updateCart()
    {

        $cartItemess = MyCart::content();

        foreach ($cartItemess as $item) {

            //  $this->quantity[$item->id] = $item->qty;

            MyCart::update($item->rowId, $this->quantity[$item->id]);
        }
        $this->emit('cart_updated');
    }
}
