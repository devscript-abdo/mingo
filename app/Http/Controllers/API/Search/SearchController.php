<?php

namespace App\Http\Controllers\API\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Search\SearchRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{



    public function search(SearchRequest $request)
    {
        $data = $request->validated();

        $search = '%' . $data['query'] . '%';

        $searchResults = Product::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('content', 'like', $search)
            ->get();
        if (count($searchResults)) {
            return response()->json([
                'payload' => ProductResource::collection($searchResults),
                '_response' => ['msg' => 'Search is Done']
            ], 200);
        }
        return response()->json([
            'payload' => [],
            '_response' => ['msg' => 'No products found']
        ], 200);
    }
}
