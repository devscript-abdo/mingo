<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FactureController extends Controller
{
    //

    public function index()
    {
        $factures = auth()
        ->guard('customer')
        ->user()
        ->invoices()
        ->get();
        /* $facts = $factures->map(function($fct,$key){
           return Storage::disk('public')->exists($fct->url);
       });
        dd($facts);*/
        return view('theme.auth.customer.app.factures.index', compact('factures'));
    }

    public function viewPdf($serial)
    {
        $pdf = Invoice::whereSerialCode($serial)->first();
        $url = Str::remove('http://localhost:8000/', $pdf->url);
        //$url = $pdf->url;
        //dd($url);
        return redirect($pdf->url);
        /*return response()->file($url, [
            'Content-Type' => 'application/pdf',
            //'Content-Disposition' => 'inline; filename="'.$serial.'"'
        ]);*/
       // return view('theme.auth.customer.app.factures.viewPdf');
    }
}
