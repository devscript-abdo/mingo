<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Brand extends Model
{
    use HasFactory;


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function scopeActive($query)
    {

        return $query->whereActive(true)->get();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getPhotoAttribute()
    {
        $image  = Voyager::image($this->logo);
        
        return $image;
    }

    public function getUrlAttribute()
    {
        return route('brands.single',$this->slug);
    }
}
