<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\WishlistRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\Wishlist;
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
                        'customerId' => auth('sanctum')->user()->id,
                        'id' => $product->id,
                        'name' => $product->name,
                        'photo' => $product->photo
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

    public function store(WishlistRequest $request)
    {
        if (auth('sanctum')->check()) {
            $id = $request->user()->currentAccessToken()->tokenable_id;

            $wish = Wishlist::where('customer_id', $id)

                ->whereIn('product_id', [$request->productId]);
            //dd($wish->toSql());
            //dd($wish->exists());
            if (!$wish->exists()) {
                $wishlist = new Wishlist();
                $wishlist->product_id = $request->productId;
                //$wishlist->customer_id = 5;
                $wishlist->save();

                $message = 'le produit est ajouté à votre Favorie';
                return response()->json(
                    [

                        'payload' =>   [],
                        '_response' => ['msg' => $message]
                    ],
                    200
                );
            } else {
                $message = 'le produit est deja dans votre Favorie';
                return response()->json(
                    [

                        'payload' =>   [],
                        '_response' => ['msg' => $message]
                    ],
                    200
                );
            }
        }
    }

    public function delete(Request $request)
    {
        $request->validate(['productId' => 'required|integer']);

        $wish = Wishlist::where('product_id', $request->productId)
            ->where('customer_id', auth('sanctum')->user()->id)
            ->first();

        if ($wish) {

            $wish->delete();

            return response()->json(
                [

                    'payload' =>   [],
                    '_response' => ['msg' => 'les produit a été supprimé depuis votre favori']
                ],
                200
            );
        }
        return response()->json(
            [

                'payload' =>   [],
                '_response' => ['msg' => 'error']
            ],
            200
        );
    }
}
