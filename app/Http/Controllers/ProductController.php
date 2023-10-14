<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {

        return Product::all();
    }

    public function apiID($id)
    {
        return Product::whereId($id)->first();
    }

    public function index()
    {
        // $topAds = $this->Ads()->locationIn('top_products_page', 10);

        $products = $this->Product()->withRelated(['category']);

        $brands = $this->Brand()->activeItems();

        $colors = $this->Color()->active();

        return view('theme.products.index', compact('brands', 'colors', 'products'));
    }

    public function indexWithFilters()
    {

        if (request()->has('mingoFilter') && request()->filled('mingoFilter')) {

            // dd(request()->mingoFilter['GetCategory']);

            /* $slug = request()->mingoFilter['GetCategory'];

            $category = $this->Category()->model()->whereSlug($slug)->firstOrFail()->id;*/

            $products = QueryBuilder::for($this->Product()->model())

                ->allowedFilters([

                    //AllowedFilter::exact('GetCategory', 'filters_category'),
                    AllowedFilter::scope('GetBrand', 'filters_brand'),
                    AllowedFilter::scope('GetColor', 'filters_color'),

                ])
                ->with(['category', 'translations'])
                //->paginate(10)
                //->appends(request()->query())
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {

            //$products = $this->Product()->withRelated(['category']);
            $products = $this->Product();
        }

        // $colors = $this->Color()->active();

        $brands = $this->Brand()->activeItems();

        return view('theme.products.index', compact('brands', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($product)
    {
        $product = $this->Product()->getProduct($product, ['category', 'colors', 'brand']);

        $products = $this->Product()
            ->model()
            ->whereNotIn('id', [$product->id])
            ->with(['category'])
            ->get();

        $cart = Cart::content();

        return view('theme.products.single.single', compact('product', 'products', 'cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
