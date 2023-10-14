<?php

namespace App\Repositories;

use Illuminate\Cache\CacheManager;

trait CacheTrait
{
    public function setCache()
    {
        return app(CacheManager::class);
    }

    private function timeToLive()
    {
        return \Carbon\Carbon::now()->addDays(config('mingo.elequont_cache_days'));
    }
}
