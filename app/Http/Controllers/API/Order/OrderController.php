<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth('sanctum')
            ->user()
            ->orders()
            ->get();
        return response()->json(
            [
                'payload' =>  OrderResource::collection($orders),
                '_response' => ['msg' => 'successfully Orders']
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

    public function show($id)
    {

        $order = auth('sanctum')
            ->user()
            ->orders()
            ->find($id);

        if ($order) {
            return new OrderDetailResource($order);
        }
        return response()->json(['error' => 'Order not found'], 404);
    }
}
