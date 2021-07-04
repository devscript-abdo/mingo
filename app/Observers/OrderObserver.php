<?php

namespace App\Observers;

use App\Models\Order;

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
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    private function clearAllCache($id)
    {
        $id = json_encode($id);

        cache()->pull("orders_cache_{$id}");
        cache()->pull("orders_cache_slug_{$id}");
    }
}
