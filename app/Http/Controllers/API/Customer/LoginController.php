<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\LoginRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        //check email if exists
        $user = Customer::whereEmail($data['email'])->first();
        // check password
        if (!$user || !Hash::check($data['password'], $user->password)) {

            return response()->json([
                'message' => 'Ces identifiants ne correspondent pas à nos enregistrements'
            ], 401);
        }

        $token = $user->createToken($data['email'])->plainTextToken;

        return response()->json([
            'payload' =>
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
            ],
            '_response' => ['msg' => 'user logged with success']
        ], 201);
    }
}
