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
        $lists = auth('sanctum')
            ->user()
            ->wishlist()
            ->with('products')
            ->get()
            ->map(function ($list) {
                return $list->products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'photo'=>$product->photo
                    ];
                })->toArray();

            })->collapse(); //The collapse method collapses a collection of arrays into a single, flat collection
              ///https://laravel.com/docs/8.x/collections#method-collapse
              
        count($lists) ? $message = 'successfully wishlist' : $message = 'no wishlist';
        return response()->json(
            [
                //'payload' =>  WishlistResource::collection($lists),
                'payload' =>   $lists, //The collapse method collapses a collection of arrays into a single, flat collection
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
