<?php

namespace App\Repositories\Team;

use App\Models\Team;
use App\Repositories\CacheTrait;

class TeamRepositoryCache  implements TeamInterface
{

    use CacheTrait;

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
        return $this->setCache()->remember('teams_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }

    public function activeItems()
    {
        return $this->setCache()->remember('teams_cache_active', $this->timeToLive(), function () {
            return $this->model->active();
        });
    }
}
