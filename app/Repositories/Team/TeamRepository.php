<?php

namespace App\Repositories\Team;

use App\Models\Team;

class TeamRepository implements TeamInterface
{
    protected $model;

    public function __construct(Team $model)
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

    public function activeItems()
    {
        return $this->model->active();
    }
}
