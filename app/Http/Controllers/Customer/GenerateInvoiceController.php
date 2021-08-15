<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\GenerateInvoiceRequest;
use App\Notifications\Customer\Invoice\SendInvoiceNotification;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GenerateInvoiceController extends Controller
{


    private $invoiceLogo;

    public function __construct()
    {
        $this->invoiceLogo = \Mingo::getInvoiceLogo();
    }

    public function generate(GenerateInvoiceRequest $request)
    {
        $order = $this->Order()->getOrderDetail($request->order);



        $client = new Party([
            'name'          => 'MINGO',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $order->billing_name,
            'address'       => $order->billing_city . ' - ' . $order->billing_address,
            'code'          => $order->full_number,
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
                ->title($product->field('name'))
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
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Facture')
            ->series('BIG')
            ->sequence(667)
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
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . '-' . Str::slug($customer->name) . '-' . $order->full_number . '-' . date('Y-m-d'))
            ->addItems($items)
            ->notes($notes)
            ->logo($this->invoiceLogo)
            //->logo(public_path('vendor/invoices/sample-logo.png'))

            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();

        // Then send email to party with link

        $order->invoice()->firstOrCreate(['url' => $link], [
            'url' => $link,
            'customer_id' => auth()->guard('customer')->user()->id ?? null,
            'count_download' => +1,
        ]);

        auth('customer')->user()->notify(new SendInvoiceNotification($link));

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
