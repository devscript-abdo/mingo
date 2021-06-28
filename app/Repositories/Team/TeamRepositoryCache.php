<?php

namespace App\Repositories\Team;

use App\Models\Team;

use Illuminate\Cache\CacheManager;

class TeamRepositoryCache  implements TeamInterface
{

    protected $model;

    protected $cache;

    const TTL = 1440; // TTL(Time To Live) 1440 = 1day

    public function __construct(Team $model, CacheManager $cache)
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
        return $this->cache->remember('teams_cache', self::TTL, function () {
            return $this->model->all();
        });
    }

    public function activeItems()
    {
        return $this->cache->remember('teams_cache_active', self::TTL, function () {
            return $this->model->active();
        });
    }
}
