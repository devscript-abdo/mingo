<?php

namespace App\Http\Mingo\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as MyCart;

class Cart extends Component
{

    public $cartItemess;

    public array $quantity = [];

    protected $listeners = ['addToCartHome' => 'fromTest'];

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

    public function fromTest()
    {
        dd('Iyuiiuiu');
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

    public function removeCart()
    {
        MyCart::destroy();
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
        if ($prod->qty !== 1) {
            $qte = $prod->qty - 1;
            MyCart::update($rowId, $qte);
        }
    }
}
