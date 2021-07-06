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

    public function delete(Request $request)
    {
        $order = $this->Order()
            ->model()
            ->whereSlug($request->ordercancel)
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->firstOrFail();
        if ($order) {
            $order->delete(); // SoftDeletes
            //$order->foreceDelete(); // Hard Delete
            return redirect()->back();
        }

        return back();
    }
}
