<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProviderProductsScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check() && auth()->guard() !== 'customer') {

            $builder->where('provider_id', auth()->guard('customer')->user()->id);
        }

        /*if (auth()->check()) {

            $builder->where('provider_id', auth()->id());
        }*/
    }
}
