<?php

namespace App\Traits;

trait InterfaceHandler
{

    public function __call($name, $arguments)
    {

        return  $this->getModel($name);
    }

    public function getModel($modelName)
    {
        return app("App\\Repositories\\{$modelName}\\{$modelName}Interface");
    }
}
