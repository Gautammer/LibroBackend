<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\lsPartner;
use App\Model\lsState;
use App\Model\lsCity;

class PartnerController extends Controller
{
    //

    public function index()
    {
       	$partners = lsPartner::all();
       	$randProduct = [];
       	 foreach($partners as $productKey){
       	 	$statename = lsState::where('stateid',$productKey->stateid)->select('statename')->first();
       	 	$cityname = lsCity::where('cityid',$productKey->cityid)->select('cityname')->first();
       	 	$productKey->stateid = $statename->statename;
       	 	$productKey->cityid = $cityname->cityname;
       	 	$randProduct[] = $productKey;
       	 }
       	// return $randProduct;
        return view('admin.partner.index',compact('randProduct'));
    }
    public function create(Request $request)
    {
        return view('admin.partner.create');
    }

     public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
        return view('admin.partner.edit');
    }

     public function show(){
     	
        return view('admin.partner.partnerView');
    }

    public function update(Request $request, $id,lsCategory $lsCategory)
    {
        
       
    }

    public function destroy($id)
    {
       
        
    }
}
