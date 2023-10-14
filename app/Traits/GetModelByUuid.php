<?php

namespace App\Traits;

trait GetModelByUuid
{
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
