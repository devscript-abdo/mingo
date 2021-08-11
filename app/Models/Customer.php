<?php

namespace App\Models;

use App\Notifications\Customer\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;
use TCG\Voyager\Facades\Voyager;

use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'registred_by',
        'phone',
        'addresse',
        'city'
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
        return $this->avatar ??
            Voyager::image(setting('customers.default_avatar'));
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

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    /*****Notifications */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
