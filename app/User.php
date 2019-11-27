<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    protected $table = "ls_user_registrations";
    protected $primaryKey = "uid";

    protected $fillable = [
        'uname',
        'uemail',
        'umobileno',
        'cityid',
        'stateid',
        'otp',
        'password',
        'profile_pic',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
        'email_verified_at',
        'mobileno_verified_at',
        'usertype',
        'forget_password_token',
        'is_active',
        'updated_at'        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForMail($notification)
    {
        return $this->uemail;
    }

    public function findForPassport($username)
    {
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'uemail' : 'umobileno';
        return $this->where($field, $username)->first();
    }
}
