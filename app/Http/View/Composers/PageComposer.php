<?php

namespace App\Http\View\Composers;

use App\Repositories\Page\PageInterface;
use Illuminate\Cache\CacheManager;
use Illuminate\View\View;

class PageComposer
{
    protected $pages;

    protected $cache;

    public function __construct(PageInterface $pages, CacheManager $cache)
    {
        // Dependencies are automatically resolved by the service container...
        if (! $this->pages) {

            $this->pages = $pages;
        }
        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('footerPages', $this->cache->remember('footerPages', $this->timeToLive(), function () {
            return $this->pages->getFooters();
        }));
    }

    private function timeToLive()
    {
        /* cache expired time(mins) */
        return \Carbon\Carbon::now()->addDays(30);
    }
}
