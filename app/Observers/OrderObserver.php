<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
      //  dd($order);
        $this->clearAllCache();
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        $this->clearAllCache();
    }

    private function clearAllCache()
    {
        if (auth()->guard('customer')->check()) {

            $id = json_encode(auth()->guard('customer')->user()->id);

            cache()->pull("orders_cache_{$id}");
            cache()->pull("orders_cache_slug_{$id}");
            cache()->pull('orders_cache_');
            cache()->pull('orders_cache_slug_');
        } else {

            $id = json_encode(auth('sanctum')->user()->id ?? null);

            cache()->pull("orders_cache_{$id}");
            cache()->pull("orders_cache_slug_{$id}");
            cache()->pull('orders_cache_');
            cache()->pull('orders_cache_slug_');
        }
    }
}
