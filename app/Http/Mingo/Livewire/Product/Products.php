<?php

namespace App\Http\Mingo\Livewire\Product;

use App\Models\Product;
use App\Models\Wishlist;
use App\Repositories\Product\ProductInterface;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $quantity;

    public $sorting;

    public $pagesize;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->quantity = 1;

        $this->sorting = 'latest';

        $this->pagesize = 20;
    }

    public function render()
    {

        if ($this->sorting === 'latest') {
            $products = app(ProductInterface::class)->model()->with(['category'])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting === 'price') {
            $products = app(ProductInterface::class)->model()->with(['category'])->orderBy('price', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting === 'price-desc') {
            $products = app(ProductInterface::class)->model()->with(['category'])->orderBy('price', 'ASC')->paginate($this->pagesize);
        } else {
            $products = app(ProductInterface::class)->model()->with(['category'])->paginate($this->pagesize);
        }

        return view('livewire.product.products', compact('products'));
    }


    public function addToCart($product_id)
    {

        $product = Product::findOrFail($product_id);

        Cart::add(
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

    public function addToWishList($productId)
    {
        if (auth()->guard('customer')->check()) {

            $wish = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)

                ->whereIn('product_id', [$productId]);
            //dd($wish->toSql());
            //dd($wish->exists());
            if (!$wish->exists()) {
                $wishlist = new Wishlist();
                $wishlist->product_id = $productId;
                //$wishlist->customer_id = auth()->guard('customer')->user()->id;
                $wishlist->save();

                $this->dispatchBrowserEvent('added_to_cart', [
                    'type' => 'success',
                    'message' => 'le produit est ajouté à votre Favorie'
                ]);
            }
            /*$this->dispatchBrowserEvent('added_to_cart', [
                'type' => 'success',
                'message' => 'le produit est deja à votre Favorie'
            ]);*/
        }
    }

    public function openModalView($productId)
    {
        $product = Product::findOrFail($productId);

        $this->emit('viewProduct', $product);
    }
}
