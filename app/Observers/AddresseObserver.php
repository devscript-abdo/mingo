<?php

namespace App\Observers;

use App\Models\Addresse;

class AddresseObserver
{
    /**
     * Handle the Addresse "created" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function created(Addresse $addresse)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Addresse "updated" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function updated(Addresse $addresse)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Addresse "deleted" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function deleted(Addresse $addresse)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Addresse "restored" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function restored(Addresse $addresse)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Addresse "force deleted" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function forceDeleted(Addresse $addresse)
    {
        $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    private function clearAllCache($id)
    {
        $id = json_encode($id);

        cache()->pull('addresse_cache');

        cache()->pull("addresse_customer_cache_{$id}");
    }
}
