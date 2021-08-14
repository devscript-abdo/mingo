<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class saveLastLoginCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //  dd($event);
        $event->user->lastLogin()->create([
            'ip' => request()->ip(),
            'customer_id' => auth()->guard('customer')->user()->id,
            'logged_in_at' => Carbon::now(),
        ]);
    }
}