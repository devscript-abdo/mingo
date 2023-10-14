<?php

namespace App\Repositories\Slider;

use App\Models\Slider;
use Illuminate\Cache\CacheManager;

class SliderRepositoryCache implements SliderInterface
{
    protected $model;

    protected $cache;

    const TTL = 1440; // TTL(Time To Live) 1440 = 1day

    public function __construct(Slider $model, CacheManager $cache)
    {
        $this->cache = $cache;

        $this->model = $model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->cache->remember('all_sliders_cache', self::TTL, function () {
            return $this->model->all();
        });
    }

    public function activeItems()
    {
        return $this->cache->remember('sliders_cache_active', self::TTL, function () {
            return $this->model->active();
        });
    }
}
