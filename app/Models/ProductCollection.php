<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCollection extends Model
{
    use HasFactory;


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products()
    {
        return $this
            ->belongsToMany(
                Product::class,
                'product_collection_product',
                'product_collection_id',
                'product_id'
            );
        //->where('is_variation', 0);
    }

    public function scopeInHome($query)
    {
        return $query->whereActive(true)
            ->whereShowInHome(true)
            ->with(['products.category'])

            ->get();
    }

    /*****Model Getter **************************/

    public function getUrlAttribute()
    {
        return route('collections.single', $this->slug);
    }
}
