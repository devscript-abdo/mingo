<?php

namespace App\Http\Controllers\API\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\Brand\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{


    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'payload' =>  BrandResource::collection(Brand::all()),
                '_response' => ['msg' => 'successfully Brand']
            ],
            200
        );
    }
}
