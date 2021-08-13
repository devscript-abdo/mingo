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
        $this->clearAllCache();
    }

    /**
     * Handle the Addresse "updated" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function updated(Addresse $addresse)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Addresse "deleted" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function deleted(Addresse $addresse)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Addresse "restored" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function restored(Addresse $addresse)
    {
        $this->clearAllCache();
    }

    /**
     * Handle the Addresse "force deleted" event.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return void
     */
    public function forceDeleted(Addresse $addresse)
    {
        $this->clearAllCache();
    }

    private function clearAllCache()
    {
        if (!request()->routeIs('api.addresses.create.fr', 'api.addresses.create.ar')) {
            $id = json_encode(auth()->guard('customer')->user()->id);

            cache()->pull('addresse_cache');

            cache()->pull("addresse_customer_cache_{$id}");
        } else {

            $id = json_encode(auth('sanctum')->user()->id);

            cache()->pull('addresse_cache');

            cache()->pull("addresse_customer_cache_{$id}");
        }
    }
}
