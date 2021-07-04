<?php

namespace App\Repositories\ProductCollection;

use App\Models\ProductCollection;

use Illuminate\Cache\CacheManager;

class ProductCollectionRepositoryCache  implements ProductCollectionInterface
{

    protected $model;

    protected $cache;

    public function __construct(ProductCollection $model, CacheManager $cache)
    {

        $this->model = $model;

        $this->cache = $cache;
    }

    public function model()
    {
        return $this->model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->cache->remember('productsCollection_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }


    private function timeToLive()
    {
        return \Carbon\Carbon::now()->addDays(30);
    }
}
