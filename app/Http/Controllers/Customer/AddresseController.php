<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerAddresseRequest;
use App\Models\Addresse;
use Illuminate\Http\Request;

class AddresseController extends Controller
{
    //
    public function index()
    {

        $addresses = $this->Addresse()->getCustomerAddresses();

        return view('theme.auth.customer.app.addresse.index', compact('addresses'));
    }

    public function store(CustomerAddresseRequest $request)
    {
        $address = new Addresse();
        $address->name = $request->name;
        $address->addresse = $request->addresse;
        $address->city = $request->city;
        $address->phone = $request->phone;
        $address->customer_id = auth()->guard('customer')->user()->id;
        $address->is_default = true;
        $address->save();

        return back()->with('message', 'Addresse  Added');
    }

    public function delete(Request $request)
    {
        $request->validate(['addresse' => 'required|integer']);
        $address = Addresse::find($request->addresse);
        $address->delete();

        return back()->with('message', 'Addresse  Deleted');
    }
}
