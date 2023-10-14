<?php

namespace App\Repositories\Team;

interface TeamInterface
{
    public function all();

    public function query();

    public function activeItems();
}
