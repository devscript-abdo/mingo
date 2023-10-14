<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\GenerateInvoiceRequest;
use App\Notifications\Customer\Invoice\SendInvoiceNotification;
use App\Notifications\Customer\Invoice\SendSMSNotification;
use Illuminate\Support\Str;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;

class GenerateInvoiceController extends Controller
{
    public function generate(GenerateInvoiceRequest $request)
    {

        $order = $this->Order()->getOrderDetail($request->order);

        $client = new Party([
            'name' => config('invoiceGenerator.seller_info.seller_name'),
            'phone' => config('invoiceGenerator.seller_info.seller_phone'),
            'address' => config('invoiceGenerator.seller_info.seller_addresse'),
            'custom_fields' => [

                'ICE' => config('invoiceGenerator.seller_info.seller_ice'),
            ],
        ]);

        $customer = new Party([
            'name' => $order->billing_name,
            'address' => $order->billing_city.' - '.$order->billing_address,
            'code' => $order->full_number,
            'custom_fields' => [
                'order number' => $order->full_number,
                'téléphone' => $order->billing_phone,
                'méthode de paiement' => $order->payment_gateway,
            ],
        ]);

        /***
         * https://github.com/LaravelDaily/laravel-invoices
         */
        /* $items = [
            (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),

        ];*/

        // $products = $order->products;
        $items = $order->products->map(function ($product, $key) {

            return (new InvoiceItem())
                ->title($product->name)
                ->pricePerUnit($product->price)
                ->quantity($product->pivot->quantity);
        });

        /* $items = [
            (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),

        ];*/

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode('<br>', $notes);

        $invoice = Invoice::make('Facture')
            ->series('MNG-F')
            ->sequence($order->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            //->date(now()->subWeeks(1))
            ->date(now())
            ->dateFormat('d/m/Y')
            ->payUntilDays(14)
            ->currencySymbol('DH ')
            ->currencyCode('MAD')
            ->currencyFormat('{VALUE} {SYMBOL}')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->filename(Str::slug($customer->name).'-'.$order->slug.'-'.date('Y-m-d'))
            ->addItems($items)
            ->notes($notes)
            //->logo($this->invoiceLogo)
            ->logo(public_path('vendor/invoices/logo.png'))

            // You can additionally save generated invoice to configured disk
            ->save('invoices');

        $link = $invoice->url();

        // Then send email to party with link

        $invoicer = $order->invoice()->firstOrCreate(['url' => $link], [
            'url' => $link,
            'customer_id' => auth()->guard('customer')->user()->id ?? null,
            'count_download' => +1,
        ]);

        // auth('customer')->user()->notify(new SendInvoiceNotification($link, $invoicer));

        // auth('customer')->user()->notify(new SendSMSNotification());

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
