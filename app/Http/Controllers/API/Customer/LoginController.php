<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\LoginRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $user->lastLogin()->create([
            'ip' => request()->ip(),
            'customer_id' => $user->id,
            'logged_in_at' => Carbon::now(),
            'device' => 'application_Mobile'
        ]);

        return response()->json([
            'payload' =>
            [
                'id' => $user->id,
                'nom' => $user->name,
                'prenom' => $user->name,
                'email' => $user->email,
                'address' => $user->addresse,
                'ville' => $user->city,
                'zip' => '12345600',
                'photo_link' => $user->profil_avatar,

                'token' => $token,
            ],
            '_response' => ['msg' => 'user logged with success']
        ], 201);
    }
}
