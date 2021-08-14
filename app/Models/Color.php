<?php

namespace App\Models;

use App\Scopes\WithoutTranslationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;

use App\Traits\Language;

use Illuminate\Support\Str;

class Color extends Model
{
    use HasFactory, Language, Translatable;

    protected $translatable = ['name'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_color', 'color_id', 'product_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true)
            ->get();
    }

    public function setNameAttribute($value)
    {

        $this->attributes['name'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    /***********Global Scope added 14-08-2021 */

    protected static function booted()
    {
        static::addGlobalScope(new WithoutTranslationScope);
    }
}
