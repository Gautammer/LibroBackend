<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsPartnerAdharcard extends Model
{
    //
    protected $table = "ls_partner_adharcards";
    protected $primaryKey = "paid";

    protected $fillable = [
        'partner_id','aacid',
    ];
    
    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
