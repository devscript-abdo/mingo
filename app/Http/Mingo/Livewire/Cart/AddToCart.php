<?php

namespace App\Http\Mingo\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as MyCart;

class AddToCart extends Component
{
    public $prod;
    public $quantity;

    public function mount()
    {
        $this->quantity = 1;
    }
    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }

    public function addToCart($product_id)
    {

        $product = Product::findOrFail($product_id);

        MyCart::add(
            $product->id,
            $product->field('name'),
            $this->quantity,
            $product->formated_price / 1,
            0,
            [
                //'colors' => $request->colors ?? [],
                'image' => $product->photo,
                'url' => $product->url,
            ]
        );

        $this->emit('cart_updated');

        $this->dispatchBrowserEvent('added_to_cart', [
            'type' => 'success',
            'message' => 'le produit est ajouté à votre panier'
        ]);
    }
}
