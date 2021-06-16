<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddresseController extends Controller
{
    //

    public  function  index()
    {

        return view('theme.auth.customer.app.addresse.index');
    }
}
