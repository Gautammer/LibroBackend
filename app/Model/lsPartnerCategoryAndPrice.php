<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lsPartnerCategoryAndPrice extends Model
{
    //
    protected $table = "ls_partner_category_and_prices";
    protected $primaryKey = "partner_cat_nd_price_id";

    protected $fillable = [
        'partner_id','cid','price','category_name',
    ];
    
    public function getCreatedAtAttribute($value)
    {
    	return date('d-M, Y h:i A', strtotime($value));
    }
}
