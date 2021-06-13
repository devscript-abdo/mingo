<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Language;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Str;

class Product extends Model
{

    use HasFactory, Translatable, Language;

    protected $translatable = ['name', 'description', 'content'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
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
}
