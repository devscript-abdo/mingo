<?php

namespace App\Models\Admin;

use App\Models\UserLogin;
use App\Notifications\Admin\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;


class Admin extends Authenticatable //implements MustVerifyEmail
{
    use HasFactory, Notifiable,  CanResetPassword;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'active'
    ];
    

    /*****Notifications */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
