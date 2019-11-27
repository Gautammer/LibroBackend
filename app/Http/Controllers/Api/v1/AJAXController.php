<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\lsSubCategory;
use App\Model\lsProductCategory;
use App\Model\lsLocality;

class AJAXController extends Controller
{
    public function SubCategories(Request $request) {
        $SubCategories = lsSubCategory::select('scid', 'scname')->where('cid', $request->id)->get();
        return $SubCategories;
    }

    public function ProductCategories(Request $request) {
        $ProductCategories = lsProductCategory::select('pcid', 'pcname')->where('scid', $request->id)->get();
        return $ProductCategories;
    }

    public function Locality(Request $request) {
        $localities = lsLocality::select('localitie_id', 'localitie_name')->where('cityid', $request->id)->get();
        return $localities;
    }
}
