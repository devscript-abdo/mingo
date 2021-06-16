<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerInfoRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerProfilController extends Controller
{


    public  function  index()
    {

        return view('theme.auth.customer.app.user_info.index');
    }


    public function updateInfo(CustomerInfoRequest $request)
    {

        $user = Customer::findOrFail(auth()->user()->id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if (
                $request->has(['oldpassword', 'new_password', 'new_confirm_password']) &&
                $request->filled(['oldpassword', 'new_password', 'new_confirm_password'])
            ) {

                $user->password = Hash::make($request->new_password);
            }
            $user->save();
            return back()->with('message', 'Profile Updated');
        }

        return back()->with('message', 'Profile Not Updated');
    }
}
