<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class CustomerConfirmPasswordController extends Controller
{


    use ConfirmsPasswords;



    public function __construct()
    {
        $this->middleware('auth:customer');
    }


    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }
}
