<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return response()->json(['payload' =>  ProductResource::collection(Product::all())], 200);
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



}
