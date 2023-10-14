<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
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
        $sessionsAll->pop(); //remove las login because it's getted from scopeWithLastLogin() function

        return $sessionsAll->all();
    }

    public function lastLogin()
    {
        return $this->belongsTo(UserLogin::class, 'last_logged_in_id');
    }
}
