<?php

namespace App\Http\View\Composers;

use App\Repositories\Ads\AdsInterface;
use Illuminate\View\View;
use Illuminate\Cache\CacheManager;

class AdsComposer
{

    protected $ads;

    protected $cache;

    public function __construct(AdsInterface $ads, CacheManager $cache)
    {
        // Dependencies are automatically resolved by the service container...
        if (!$this->ads) {
            $this->ads = $ads;
        }
        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
     
        $view->with('ads', $this->cache->remember('ads_cache', $this->timeToLive() /* cache expired time(mins) */, function () {
            return $this->ads->all()->groupByPosition();
        }));
    }


    private function timeToLive()
    {

        return \Carbon\Carbon::now()->addDays(30);
    }
}
