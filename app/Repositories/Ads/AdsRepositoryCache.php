<?php

namespace App\Repositories\Ads;

use App\Models\Ads;
use App\Repositories\CacheTrait;

class AdsRepositoryCache implements AdsInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(Ads $model)
    {
        $this->model = $model;
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
        return $this->setCache()->remember('ads_cache', $this->timeToLive(), function () {

            return $this->model->all();
        });
    }

    public function publishedItems()
    {
        return $this->setCache()->remember('ads_published_cache', $this->timeToLive(), function () {

            return $this->model->published();
        });
    }

    public function locationIn($location, $limit)
    {
        return $this->setCache()->remember('ads_locations_cache', $this->timeToLive(), function () use ($location, $limit) {

            return $this->model->location($location, $limit);
        });
    }
}
