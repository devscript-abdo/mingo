<?php

namespace App\Repositories\Color;

use App\Models\Color;

class ColorRepository  implements ColorInterface
{

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
        return $this->model->all();
    }


    public function active()
    {
        return $this->model->active();
    }
}
