<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsAdharcard extends Model
{
    //
    protected $table = "ls_adharcards";
    protected $primaryKey = "aacid";

    protected $fillable = [
        'aaimage_front','aaimage_back','pid',
    ];

    //this function for set Uppercase letter of categoriesname
   

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
