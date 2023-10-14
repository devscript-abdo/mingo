<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'name', 'quantity', 'price', 'product_id',
    ];

    /*protected $casts  = [
        'is_filterable' =>  'boolean',
        'is_required'   =>  'boolean',
    ];*/

    protected $with = ['values'];

    public function products()
    {

        return $this->belongsToMany('App\Models\Product', 'product_attribute', 'attribute_id', 'product_id');
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
