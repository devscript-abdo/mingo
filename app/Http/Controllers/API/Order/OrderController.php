<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = auth('sanctum')
            ->user()
            ->orders()
            ->get();
        // dd(count($orders));
        // $message = '';
        count($orders) ? $message = 'successfully Orders' : $message = 'no Orders';

        return response()->json(
            [
                'payload' => OrderResource::collection($orders),
                '_response' => ['msg' => $message],
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
            ->with(['products'])
            ->find($id);

        if ($order) {
            count($order->products) ? $message = 'successfully Order Detail' : $message = 'no Order Detail';

            return response()->json(
                [
                    'payload' => OrderDetailResource::collection($order->products),
                    '_response' => ['msg' => $message],
                ],
                200
            );
        }

        return response()->json(['error' => 'Order not found'], 404);
    }

    public function delete(Request $request)
    {
        $id = $request->validate(['orderId' => 'required|integer']);

        $order = Order::whereId($id)
            ->where('customer_id', auth('sanctum')->user()->id)
            ->first();
        //  dd($order);
        if ($order) {

            OrderProduct::whereIn('order_id', [$order->id])->delete();

            //$orderDetail->delete();

            $order->delete();

            return response()->json(
                [

                    'payload' => [],
                    '_response' => ['msg' => 'cette commande a été annulée'],
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
