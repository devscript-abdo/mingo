<?php

namespace App\Models;

use App\Traits\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Translatable;

class ProductCollection extends Model
{
    use HasFactory, Language, Translatable;

    protected $translatable = ['name', 'description'];

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
            //->with(['products.category:id,slug,name'])
            ->with(['products'])
            ->get();
    }

    /*****Model Getter **************************/

    public function getUrlAttribute()
    {
        // return route('collections.single', $this->slug);

        return route('products');
    }

    /***********Global Scope added 14-08-2021 */

}
