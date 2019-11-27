<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsSubCategory extends Model
{
    //
    protected $table = "ls_sub_categories";
    protected $primaryKey = "scid";

    protected $fillable = [
        'scname','cid'
    ];

    //this function for set Uppercase letter of categoriesname
    public function setCnameAttribute($value)
    {
    	$this->attributes['scname'] = ucwords($value);
    }

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
