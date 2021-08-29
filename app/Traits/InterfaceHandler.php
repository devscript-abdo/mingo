<?php

namespace App\Traits;

trait InterfaceHandler
{

    public function __call($name, $arguments): \Illuminate\Contracts\Foundation\Application
    {

        return  $this->getModel($name);
    }

    public function getModel($modelName): \Illuminate\Contracts\Foundation\Application
    {
        return app("App\\Repositories\\{$modelName}\\{$modelName}Interface");
    }
}
