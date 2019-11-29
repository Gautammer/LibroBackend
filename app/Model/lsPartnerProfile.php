<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsPartnerProfile extends Model
{
    //
    protected $table = "ls_partner_profile";
    protected $primaryKey = "ppid";

    protected $fillable = [
        'pid','cid','scid','pcid','sid','aacid',
    ];

    //this function for set Uppercase letter of categoriesname
   

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
