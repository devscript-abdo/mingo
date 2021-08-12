<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\AddresseRequest;
use App\Http\Resources\Addresse\AddresseResource;
use App\Models\Customer;
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

    public function create(AddresseRequest $request)
    {
        $data = $request->validated();

        $user = Customer::whereId($request->user()->currentAccessToken()->tokenable_id)->first();
        if ($user) {

            $user->addresses()->create([
                'name' => $user->name,
               // 'country' => $data['country'],
                'addresse' => $data['address'],
                'phone'=> $data['phone'],
                'city' => $data['city'],
                'zip' => $data['zip'],
            ]);

            return response()->json(['_response' => ['msg' => 'address added succesufully']], 201);
        }
        return response()->json(['_response' => ['code' => 'code_404', 'message' => 'error 404']], 404);
    }
}
