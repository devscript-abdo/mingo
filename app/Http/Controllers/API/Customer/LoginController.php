<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\LoginRequest;
use App\Models\Customer;
use App\Models\Tokener;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        // Tokener Model : represent personal_access_tokens Table from database
        Tokener::whereDate('last_used_at', '<', now())->delete();


        // check if user already loggedIn
        /*$loggedUser = Tokener::whereName($data['email'])
            ->where('tokenable_type', 'App\Models\Customer')
            ->first();
        if ($loggedUser) {
            // Delete they Tokens
            $loggedUser->delete();
        }*/

        //check email if exists
        $user = Customer::whereEmail($data['email'])->first();
        // check password
        if (!$user || !Hash::check($data['password'], $user->password)) {

            return response()->json([
                'message' => 'Ces identifiants ne correspondent pas à nos enregistrements'
            ], 401);
        }
        $user->tokens()->delete(); // delete old token

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
                'phone' => $user->phone,

                'token' => $token,
            ],
            '_response' => ['msg' => 'user logged with success']
        ], 201);
    }

}
