<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class WithoutTranslationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (request()->is('ar/*') || request()->is('api/ar/*')) {

            $builder->with(['translations']);
        } else {
            $builder->without(['translations']);
        }
    }
}
