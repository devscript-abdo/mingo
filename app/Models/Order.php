<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
        'billing_province', 'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_tax', 'billing_total', 'payment_gateway', 'error',
    ];

    public function customer()
    {

        return $this->belongsTo('App\Models\Customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $number = self::max('id') + 1;
            $model->full_number = "MNG-F-" . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }
}
