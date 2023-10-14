<?php

namespace App\Observers;

use TCG\Voyager\Models\Page;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        return $this->clearAllCache($page->slug);
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        return $this->clearAllCache($page->slug);
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        return $this->clearAllCache($page->slug);
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        return $this->clearAllCache($page->slug);
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        return $this->clearAllCache($page->slug);
    }

    private function clearAllCache($slug)
    {
        $slg = json_encode($slug);
        cache()->pull('pages_cache');
        cache()->pull("page_cache_slug_{$slg}");
        cache()->pull('page_cache_footers');
    }
}
