<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;

class Team extends Model
{

    use HasFactory;

    public function scopeActive($query)
    {
        return $query->whereActive(true)->get();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getImageAttribute()
    {
        return Voyager::image($this->photo);
    }
}
