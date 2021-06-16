<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public  function  index()
    {

        return view('theme.auth.customer.app.invoices.index');
    }

    public function show()
    {
        return view('theme.auth.customer.app.invoices.detail.index');
    }
}
