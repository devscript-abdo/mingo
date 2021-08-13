<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\UpdatePasswordRequest;
use App\Http\Requests\API\Customer\UpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    //

    public function update(UpdateRequest $request)
    {
        //$tok =  $request->user()->currentAccessToken()->token;
        // dd($tok);
        $data = $request->validated();

        $user = Customer::whereId($request->user()->currentAccessToken()->tokenable_id)->first();

        // dd($user);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'city' => $data['city'],
            'addresse' => $data['addresse'],
            'phone' => $data['phone'],
            //'password' => Hash::make($data['new_password']),
        ]);

        // $request->user()->currentAccessToken()->delete(); // delete old token
        $user->tokens()->delete(); // delete old token

        $token = $user->createToken($data['email'])->plainTextToken; // generate new token

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
            '_response' => ['msg' => 'user updated with success']
        ], 201);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $data = $request->validated();

        $user = Customer::whereId($request->user()->currentAccessToken()->tokenable_id)->first();

        if (!$user || !Hash::check($data['oldpassword'], $user->password)) {

            return response()->json(['_response' => ['msg' => 'Sorry old password not Match']], 401);

        }

        if ($user) {
            if (
                $request->has(['oldpassword', 'new_password', 'new_confirm_password']) &&
                $request->filled(['oldpassword', 'new_password', 'new_confirm_password'])
            ) {

                $user->password = Hash::make($request->new_password);
            }
            $user->save();

            $user->tokens()->delete(); // delete old token
            
            return response()->json(['_response' => ['msg' => 'password updated succesufully']], 201);
        }
    }
}
