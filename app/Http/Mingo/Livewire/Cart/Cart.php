<?php

namespace App\Http\Mingo\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as MyCart;

class Cart extends Component
{

    public $cartItemess;

    public array $quantity = [];

    protected $rules = [
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer|min:1',
    ];

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
        $totalPrice = MyCart::priceTotal();
        $subTotal = MyCart::subtotal();

        return view('livewire.cart.cart', compact('cartItemes', 'totalPrice', 'subTotal'));
    }

    public function updateCart()
    {
        $this->validate();

        $cartItemess = MyCart::content();

        foreach ($cartItemess as $item) {

            //  $this->quantity[$item->id] = $item->qty;

            MyCart::update($item->rowId, $this->quantity[$item->id]);
        }
        $this->emit('cart_updated');

        redirect()->back();
    }

    public function increaseQte($rowId)
    {
        $prod = MyCart::get($rowId);
        $qte = $prod->qty + 1;
        MyCart::update($rowId, $qte);
    }

    public function decreaseQte($rowId)
    {
        $prod = MyCart::get($rowId);
        $qte = $prod->qty - 1;
        MyCart::update($rowId, $qte);
    }
}
