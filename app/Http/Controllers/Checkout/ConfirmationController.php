<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    //

    public function index()
    {
        if (!session()->has('success_message')) {

            return redirect()->route('home');
        }
        return view('theme.checkout.thankyou.index');
    }
}
