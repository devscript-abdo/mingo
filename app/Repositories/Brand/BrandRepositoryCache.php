<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\CacheTrait;

class BrandRepositoryCache implements BrandInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(Brand $model)
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
        return $this->setCache()->remember('brands_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }

    public function activeItems()
    {
        return $this->setCache()->remember('brands_cache_active', $this->timeToLive(), function () {

            return $this->model->active();
        });
    }

    public function getBrand($slug, $with = null)
    {
        $slugg = json_encode($slug);
        if (isset($with) && is_array($with)) {
            return $this->setCache()->remember("brands_cache_slug_{$slugg}", $this->timeToLive(), function () use ($slug, $with) {
                return $this->model->whereSlug($slug)->whereActive(true)
                    ->with($with)
                    ->firstOrFail();
            });
        }

        return $this->setCache()->remember("brands_cache_slug_{$slugg}", $this->timeToLive(), function () use ($slug) {

            return $this->model->whereSlug($slug)->whereActive(true)
                ->firstOrFail();
        });
    }
}
