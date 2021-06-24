<?php

namespace App\Repositories\Brand;

use App\Models\Brand;

class BrandRepository  implements BrandInterface
{

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
        return $this->model->all();
    }

    public function activeItems()
    {
        return $this->model->active();
    }

    public function getBrand($slug, $with = null)
    {
        if (isset($with) && is_array($with)) {
            return $this->model->whereSlug($slug)->whereActive(true)
                ->with($with)
                ->firstOrFail();
        }
        return $this->model->whereSlug($slug)->whereActive(true)
            ->firstOrFail();
    }
}
