<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //

    public  function  index()
    {

        return view('theme.auth.customer.app.wishlist.index');
    }
}
