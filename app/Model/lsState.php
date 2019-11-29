<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsState extends Model
{
    protected $table = "ls_states";
    protected $primaryKey = "stateid";
 	protected $fillable = [
        'statename'
    ];

    //this function for set Uppercase letter of categoriesname
    

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
