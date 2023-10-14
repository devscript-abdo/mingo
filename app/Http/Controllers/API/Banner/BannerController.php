<?php

namespace App\Http\Controllers\API\Banner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ads\AdsResource;
use App\Models\Ads;

class BannerController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'payload' => AdsResource::collection(Ads::all()),
                '_response' => ['msg' => 'successfully Banners'],
            ],
            200
        );
    }
}
