<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //

    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
        $user = Socialite::with($service)->user();

        //  return response()->json($user);
        $token = $user->token;

        $user->getId();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();

        $customer = Customer::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getEmail()),
                'name' => $user->getName(),
                'email_verified_at' => now(),
                'avatar' => $user->getAvatar(),
                'remember_token' => $token,
                'registred_by' => $service
            ]
        );
        Auth::guard('customer')->login($customer, true);

        return redirect()->route('customer.profil');
    }
}
