<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'attribute_values';

    /**
     * @var array
     */
    protected $fillable = [
        'attribute_id', 'value', 'price', 'quantity'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'attribute_id'  =>  'integer',
    ];


    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
      
        return $this->belongsToMany('App\Models\Product','product_attribute_value','attribute_value_id','product_id');

    }

    /*public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }*/
}
