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
        $lng = explode('/', request()->route()->action['prefix']);
        //dd($lng);
        $lists = auth('sanctum')
            ->user()
            ->wishlist()
            ->with('products')
            ->get()
            ->map(function ($list) use ($lng) {
                return $list->products->map(function ($product) use ($lng) {
                    /*return [
                        'customerId' => auth('sanctum')->user()->id,
                        'id' => $product->id,
                        'name' => $product->name,
                        'photo' => $product->photo
                    ];*/
                    return $this->formatedObject($product, $lng);
                })->toArray();
            })->collapse();
        //The collapse method collapses a collection of arrays into a single, flat collection
        ///https://laravel.com/docs/8.x/collections#method-collapse

        count($lists) ? $message = 'successfully wishlist' : $message = 'no wishlist';

        return response()->json(
            [
                //'payload' =>  WishlistResource::collection($lists),
                'payload' => $lists, //The collapse method collapses a collection of arrays into a single, flat collection
                '_response' => ['msg' => $message],
            ],
            200
        );
    }

    private function formatedObject($product, $lng)
    {
        return [

            'id' => $product->id,
            'addedBy' => 'mingo',
            'userId' => 1,
            'name' => $product->field('name', $lng[1]),
            'slug' => $product->slug,
            'categoryIds' => [$product->category->id],
            'brandId' => $product->brand->id ?? '',
            'unit' => '',
            'minQty' => '1',
            'refundable' => '',
            'images' => $product->all_photos,
            'thumbnail' => $product->photo,
            'featured' => '',
            'flashDeal' => '',
            'videoProvider' => '',
            'videoUrl' => '',
            'colors' => $product->all_colors,
            'variantProduct' => '',
            'attributes' => $product->all_attributes,
            'choiceOptions' => [],
            'variation' => [],
            'published' => '',
            'unitPrice' => $product->formated_price,
            'purchasePrice' => $product->formated_price,
            'tax' => '5',
            'taxType' => 'percent',
            'discount' => '20',
            'discountType' => 'percent',
            'currentStock' => '10',
            'details' => $product->field('description', $lng[1]),
            'freeShipping' => '',
            'attachment' => '',
            'createdAt' => $product->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $product->updated_at->format('Y-m-d H:i:s'),
            'status' => '',
            'featuredStatus' => '',
            'rating' => [

                (object) ['average' => '4.7', 'productId' => "$product->id"],
            ],
        ];
    }

    public function store(WishlistRequest $request)
    {
        if (auth('sanctum')->check()) {
            $id = $request->user()->currentAccessToken()->tokenable_id;

            $wish = Wishlist::where('customer_id', $id)

                ->whereIn('product_id', [$request->productId]);
            //dd($wish->toSql());
            //dd($wish->exists());
            if (! $wish->exists()) {
                $wishlist = new Wishlist();
                $wishlist->product_id = $request->productId;
                //$wishlist->customer_id = 5;
                $wishlist->save();

                $message = 'le produit est ajouté à votre Favorie';

                return response()->json(
                    [

                        'payload' => [],
                        '_response' => ['msg' => $message],
                    ],
                    200
                );
            } else {
                $message = 'le produit est deja dans votre Favorie';

                return response()->json(
                    [

                        'payload' => [],
                        '_response' => ['msg' => $message],
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

                    'payload' => [],
                    '_response' => ['msg' => 'les produit a été supprimé depuis votre favori'],
                ],
                200
            );
        }

        return response()->json(
            [

                'payload' => [],
                '_response' => ['msg' => 'error'],
            ],
            200
        );
    }
}
