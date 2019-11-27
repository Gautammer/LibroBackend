<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class lsPartner extends Authenticatable
{
	use Notifiable;

	protected $guard = 'partner_api';

	protected $table = "ls_partners";
    protected $primaryKey = "pid";

	protected $fillable = [
		'pname',
		'pmobileno',
		'otp',
		'pemail',
		'password',
		'cityid',
		'stateid',
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForMail($notification)
    {
        return $this->pemail;
    }

    public function findForPassport($username)
    {
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'pemail' : 'pmobileno';
        return $this->where($field, $username)->first();
    }
}
