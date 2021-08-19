<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Review\ReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function index()
    {
        return ReviewResource::collection(Review::all());
    }


    public function store(ReviewRequest $request)
    {

        $review = Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'product_id' => $request->productId,
            //'customer_id' => $request->name,
        ]);

        if ($review) {
            return response()->json(
                [

                    '_response' => ['msg' => 'successfully Created Review wait ... when its accepted by Admin']
                ],
                201
            );
        }
        return response()->json(
            [

                '_response' => ['msg' => 'Error Created Review']
            ],
            201
        );
    }
}
