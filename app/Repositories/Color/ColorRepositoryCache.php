<?php

namespace App\Repositories\Color;

use App\Models\Color;
use App\Repositories\CacheTrait;

class ColorRepositoryCache implements ColorInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(Color $model)
    {
        $this->model = $model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->setCache()->remember('colors_cache', $this->timeToLive(), function () {

            return $this->model->all();
        });
    }

    public function active()
    {
        return $this->setCache()->remember('colors_active_cache', $this->timeToLive(), function () {

            return $this->model->active();
        });
    }
}
