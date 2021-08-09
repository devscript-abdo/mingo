<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json(
            [
                'payload' =>  CategoryResource::collection(Category::all()),
                '_response' => ['msg' => 'successfully']
            ],
            200
        );
    }

    public function show($id)
    {
        $category = Category::without(['childrens', 'translations'])->find($id);

        if ($category) {

            return response()->json([
                'payload' =>   new CategoryResource($category),
                '_response' => ['msg' => 'successfully single category']
            ], 200);
             // return new CategoryResource($category);
        }
        return response()->json(['error' => 'category not found'], 404);
    }

    public function getProductsOfCategory($id)
    {
        $category = Category::find($id);

        if ($category) {
            //  return    CategoryResource::collection(Product::all());

            return response()->json(['payload' => $category->products, '_response' => ['message' => 'done']], 200);
        }
        return response()->json(['error' => 'product not found'], 404);
    }
}
