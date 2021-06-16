<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'city',
        'addresse',
        'is_default',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
