<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsCategory extends Model
{
    protected $table = "ls_categories";
    protected $primaryKey = "cid";

    protected $fillable = [
        'cname','cityid',
    ];

    //this function for set Uppercase letter of categoriesname
    public function setCnameAttribute($value)
    {
    	$this->attributes['cname'] = ucwords($value);
    }

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
