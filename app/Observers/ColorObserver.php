<?php

namespace App\Observers;

use App\Models\Color;

class ColorObserver
{
    /**
     * Handle the Color "created" event.
     *
     * @return void
     */
    public function created(Color $color)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Color "updated" event.
     *
     * @return void
     */
    public function updated(Color $color)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Color "deleted" event.
     *
     * @return void
     */
    public function deleted(Color $color)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Color "restored" event.
     *
     * @return void
     */
    public function restored(Color $color)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Color "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Color $color)
    {
        return $this->clearAllCache();
    }

    private function clearAllCache()
    {

        cache()->pull('colors_cache');

        cache()->pull('colors_active_cache');
    }
}
