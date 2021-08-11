<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Addresse\AddresseResource;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    //


    public function index()
    {
        $addresses = auth('sanctum')
            ->user()
            ->addresses()
            ->get();
        // dd(count($orders));
        // $message = '';
        count($addresses) ? $message = 'successfully addresses' : $message = 'no addresses';
        return response()->json(
            [
                'payload' =>  AddresseResource::collection($addresses),
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
