<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //

    public function logout(Request $request)
    {
        auth()
            //->guard('customer')
            ->user()
            ->tokens()
            ->delete();

        return response()->json([
            'payload' => [
                'msg' => 'user Logged out',
            ],
        ]);
    }
}
