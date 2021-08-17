<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Review\ReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    


    public function store(ReviewRequest $request)
    {

        $review = auth('sanctum')->user()->reviews()->create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'product_id' => $request->productId,
            //'customer_id' => $request->name,
        ]);

        if($review){
            
        }
    }
}
