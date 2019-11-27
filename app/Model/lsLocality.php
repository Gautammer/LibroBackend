<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsLocality extends Model
{
    //
    protected $table = "ls_localities";
    protected $primaryKey = "localitie_id";

    protected $fillable = [
        'localitie_name','cityid',
    ];

    //this function for set Uppercase letter of categoriesname
    public function setCnameAttribute($value)
    {
    	$this->attributes['localitie_name'] = ucwords($value);
    }

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }

}
