<?php

namespace App\Repositories\Ads;

use App\Models\Ads;

class AdsRepository  implements AdsInterface
{

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
        return $this->model()->query();
    }

    public function all()
    {
        return $this->model()->all();
    }

    public function publishedItems()
    {
        return $this->model()->published();
    }

    public function locationIn($location, $limit)
    {
        return $this->model()->location($location, $limit);
    }
}
