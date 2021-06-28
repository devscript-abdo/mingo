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

    public function show($slug)
    {
        // $order = Order::whereSlug($slug)->firstOrFail();
        if (auth()->guard('customer')->check()) {
            $order = auth()
                ->guard('customer')
                ->user()->orders()
                ->whereSlug($slug)
                ->firstOrFail();
        } else {
            $order = Order::whereSlug($slug)->firstOrFail();
        }

        return view('theme.auth.customer.app.invoices.detail.index', compact('order'));
    }
}
