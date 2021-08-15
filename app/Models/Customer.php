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

    public function scopeWithLastLogin($query)
    {
        return $query->addSelect([
            'last_logged_in_id' => UserLogin::select('id')
                // ->whereColumn('customer_id', 'customers.id')
                ->where('customer_id', $this->id)
                ->orderBy('logged_in_at', 'desc')
                ->limit(1),
        ])->with(['lastLogin'])->first();
    }

    //https://laravel.com/docs/8.x/collections#method-pop
    public function GetLoginHistory()
    {
        $sessionsAll = $this->loginHistory()->get() ?? [];
        $sessionsAll->pop();//remove las login because it's getted from scopeWithLastLogin() function
        return $sessionsAll->all();
    }

    public function lastLogin()
    {
        return $this->belongsTo(UserLogin::class, 'last_logged_in_id');
    }

    public function loginHistory()
    {
        return $this->hasMany(UserLogin::class);
    }


    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }
}
