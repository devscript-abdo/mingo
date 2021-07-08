<?php

namespace App\Http\Controllers\API\Customer;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken($data['email'])->plainTextToken;

        return response()->json([
            'payload' =>
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
            ],
            '_response' => ['msg' => 'user created with success']
        ], 201);
    }
}
