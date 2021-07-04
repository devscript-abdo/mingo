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

        $orders = $this->Order()->getCustomerOrders();

        return view('theme.auth.customer.app.invoices.index', compact('orders'));
    }

    public function show($slug)
    {
        $order = $this->Order()->getOrderDetail($slug);

        return view('theme.auth.customer.app.invoices.detail.index', compact('order'));
    }
}
