<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsService extends Model
{
    //
protected $table = "ls_services";
    protected $primaryKey = "sid";

    protected $fillable = [
        'sname','cid','scid','pcid','stateid','sdetails','sp_status','uid','updateuid','status',
    ];

    //this function for set Uppercase letter of categoriesname
    public function setCnameAttribute($value)
    {
    	$this->attributes['sname'] = ucwords($value);
    }

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }

}
