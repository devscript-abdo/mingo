<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait UuidGenerator
{
    public function scopeUuid(Builder $query, $uuid): Builder
    {
        return $query->where($this->getUuidName(), $uuid);
    }

    public function getUuidName(): string
    {
        return property_exists($this, 'uuidName') ? $this->uuidName : 'uuid';
    }

    public static function bootUuidGenerator(): void
    {
        static::creating(function ($model) {
            if (Schema::hasColumn($model->getTable(), $model->getUuidName())) {
                $model->{$model->getUuidName()} = Str::uuid();
            }
        });
    }
}
