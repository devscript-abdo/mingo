<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return   ProductResource::collection(Product::all());
        // return  new ProductResource(Product::all()->toArray());
        return response()->json(
            [
                'payload' =>  ProductResource::collection(Product::all()),
                '_response' => ['msg' => 'successfully']
            ],
            200
        );

        /*****Using Cache ****/

        /*return response()->json(
            [
                'payload' =>  ProductResource::collection(Cache::remember('api-products', $this->timeToLiveForCache(), function () {
                    return Product::all();
                })),

                '_response' => ['msg' => 'successfully']
            ],
            200
        );*/
    }

    public function latest()
    {
        return response()->json(
            [
                'payload' =>  ProductResource::collection(Product::latest('created_at')->get()),
                '_response' => ['msg' => 'successfully']
            ],
            200
        );

        /*****Using Cache ****/

        /*return response()->json(
            [
                'payload' =>  ProductResource::collection(Cache::remember('api-products-latest', $this->timeToLiveForCache(), function () {
                    return Product::latest('created_at')->get();
                })),

                '_response' => ['msg' => 'successfully']
            ],
            200
        );*/
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);

        if ($product) {
            return new ProductResource($product);
        }
        return response()->json(['error' => 'product not found'], 404);
    }

    public function getProductsCollections()
    {
        $collections = $this->ProductCollection()->showInHome();

        $collectProducts = $collections->map(function ($collection, $key) {

            // return $collection->products;

            return $this->productCollectionObject($collection->products, $collection->name);
            
        })->all();

        // dd($collectProducts);

        if ($collections) {
            return response()->json(
                [
                    'payload' => $collectProducts,
                    '_response' => ['msg' => 'successfully Collections Products']
                ],
                200
            );
        }
    }

    public function productCollectionObject($data, $collectionName)
    {

        return [
            'collection_name' => $collectionName,
            'products' => ProductResource::collection($data)
        ];
    }
}
