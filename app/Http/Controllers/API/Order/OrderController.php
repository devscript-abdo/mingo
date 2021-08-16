<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Product\ProductResource;
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
                'payload' =>  OrderResource::collection($orders),
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

    public function show($id)
    {

        $order = auth('sanctum')
            ->user()
            ->orders()
            ->with(['products'])
            ->find($id);

        if ($order) {
            return new OrderDetailResource($order);
            // return ProductResource::collection($order->products);
        }
        return response()->json(['error' => 'Order not found'], 404);
    }


    private function orderDetailToJson($product)
    {
        return [
            'id' => $this->id,
            'order_id' => $this->id,
            'product_id' => $product->id,
            'seller_id' => 1,
            'product_details' => ProductResource::collection($this->products),

            'qty' => $product->pivot->quantity,
            'price' => $product->pivot->quantity * $product->price,
            'discount' => $this->billing_discount_code,
            'delivery_status' => $this->delivery_status,
            'payment_status' => $this->is_payed,
            'shipping_method_id' => 1,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
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

                    'payload' =>   [],
                    '_response' => ['msg' => 'cette commande a été annulée']
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
