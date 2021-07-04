<?php

namespace App\Repositories\ProductCollection;

use App\Models\ProductCollection;

class ProductCollectionRepository  implements ProductCollectionInterface
{

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
        return $this->model->all();
    }

    public function showInHome()
    {
        return $this->model()->inHome();
    }
}
