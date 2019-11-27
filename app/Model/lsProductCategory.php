<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsProductCategory extends Model
{
    //
    protected $table = "ls_product_categories";
    protected $primaryKey = "pcid";

    protected $fillable = [
        'pcname','scid'
    ];

    //this function for set Uppercase letter of categoriesname
    public function setCnameAttribute($value)
    {
    	$this->attributes['pcname'] = ucwords($value);
    }

    

    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
