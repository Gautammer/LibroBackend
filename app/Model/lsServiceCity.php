<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsServiceCity extends Model
{
    //

     protected $table = "ls_service_cities";
    protected $primaryKey = "scityid";
 	protected $fillable = [
        'sid','cityid','cityname'
    ];

    //this function for set Uppercase letter of categoriesname
    

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
