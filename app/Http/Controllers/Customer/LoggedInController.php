<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoggedInController extends Controller
{
    

    public  function  index()
    {

        $sessions = auth()->guard('customer')->user()->withLastLogin() ?? [];

        return view('theme.auth.customer.app.logged.index', compact('sessions'));
    }
}