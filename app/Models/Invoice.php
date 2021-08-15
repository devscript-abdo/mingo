<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invoice extends Model
{

    use HasFactory;

    protected $guarded  = [];


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $number = (self::max('id') + 1)  . '#' . auth('customer')->user()->id;
            $model->serial_numer = str_pad($number, 5, 0, STR_PAD_LEFT) . '/MINGO';
            $model->serial_code = Str::uuid();
        });
    }
}
