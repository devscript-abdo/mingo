<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public  function  index()
    {

        $orders = auth()->guard('customer')->user()->orders()->with('products')->get();

        return view('theme.auth.customer.app.invoices.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('theme.auth.customer.app.invoices.detail.index', compact('order'));
    }
}
