<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Wishlist\WishlistResource;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    //

    public function index()
    {
        $list = auth('sanctum')
            ->user()
            ->wishlist()
            ->with('products')
            ->get()
            ->map(function ($list) {
                // dd($list->products);
                return [
                    'id' => $list->id,
                    'products' => $list->products->map(function ($product) {
                        // dd($product);
                        return [
                            'productId' => $product->id,
                            'name' => $product->name,
                            'photo' => $product->photo,
                        ];
                    })->toArray()

                ];
            })
            ->toArray();
        dd($list);
        // $message = '';
        count($list) ? $message = 'successfully wishlist' : $message = 'no wishlist';
        return response()->json(
            [
                'payload' =>  WishlistResource::collection($list),
                '_response' => ['msg' => $message]
            ],
            200
        );

        /*****Using Cache ****/

        /*return response()->json(
        [
            'payload' =>  OrderResource::collection(Cache::remember('api-orders', $this->timeToLiveForCache(), function () {
                return $orders;
            })),

            '_response' => ['msg' => 'successfully orders']
        ],
        200
    );*/
    }
}
