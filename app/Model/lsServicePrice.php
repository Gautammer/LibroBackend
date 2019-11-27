<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsServicePrice extends Model
{
    //
    protected $table = "ls_service_prices";
    protected $primaryKey = "spid";

    protected $fillable = [
        'sid','cityid','sprice','updateuid',
    ];

    //this function for set Uppercase letter of categoriesname
   

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
