<?php

namespace App\Repositories\ProductCollection;

use App\Models\ProductCollection;
use App\Repositories\CacheTrait;

class ProductCollectionRepositoryCache implements ProductCollectionInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(ProductCollection $model)
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
        return $this->setCache()->remember('productsCollection_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }

    public function showInHome()
    {
        return $this->setCache()->remember('productsCollection_cache_home', $this->timeToLive(), function () {

            return $this->model()->inHome();
        });
    }
}
