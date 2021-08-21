<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'user_logins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'ip',
        'type',
        'logged_in_at',
        'device'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function getMachineAttribute()
    {
        return str_replace('_', ' ', $this->device);
    }
}
