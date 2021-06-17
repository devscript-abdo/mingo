<?php

namespace App\Http\Mingo\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class SingleProduct extends Component
{

    public array $quantity = [];

    public $product;

    public $cart;

    public function mount($product)
    {
        $this->product = $product;

        $this->quantity[$product->id] = 1;
    }

    public function render()
    {
        return view('livewire.product.single-product');
    }

    public function addToCart($product_id)
    {

        $product = Product::findOrFail($product_id);

        Cart::add(
            $product->id,
            $product->field('name'),
            $this->quantity[$product_id],
            $product->price / 100,
            0,
            [

                //'colors' => $request->colors ?? [],
                'image' => $product->photo,
                'url' => $product->url,
            ]
        );

        $this->emit('cart_updated');
    }
}
