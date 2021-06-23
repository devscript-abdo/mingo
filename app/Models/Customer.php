<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Facades\Voyager;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfilAvatarAttribute()
    {
        return setting('customers.default_avatar') ?
            Voyager::image(setting('customers.default_avatar'))
            :
            $this->avatar;
    }

    /*******Relations */

    public function addresses()
    {

        return $this->hasMany('App\Models\Addresse');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order')->orderBy('created_at', 'DESC');
    }

    public function wishlist()
    {
        return $this->hasOne('App\Models\Wishlist');
    }
}
