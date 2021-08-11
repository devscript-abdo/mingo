<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json(
            [
                'payload' =>  CategoryResource::collection(Category::whereNull('parent_id')->get()),
                '_response' => ['msg' => 'successfully Catégories']
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
        return response()->json(['_response' => ['code' => 'code_404', 'message' => 'error 404']], 404);
    }

    public function getProductsOfCategory($id)
    {
        $category = Category::without(['childrens', 'translations'])->find($id);

        if ($category) {
          
            return response()->json(

                ['payload' => ProductResource::collection($category->products), '_response' => ['message' => 'successfully products of category']
                
            ], 200);
        }
        return response()->json(['_response' => ['code' => 'code_404', 'message' => 'error 404']], 404);
    }
}
