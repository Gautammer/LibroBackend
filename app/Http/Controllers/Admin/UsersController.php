<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\lsState;
use App\Model\lsCity;
use App\Model\lsLocality;

class UsersController extends Controller
{
    //
    public function index()
    {
        $userData = User::all();  
        $randProduct = [];
         foreach($userData as $productKey){
            $statename = lsState::where('stateid',$productKey->stateid)->select('statename')->first();
            $cityname = lsCity::where('cityid',$productKey->cityid)->select('cityname')->first();
            // $localitie_name = lsLocality::where('localitie_id',$productKey->localitie_id)->select('localitie_name')->first();
            // if()
            $productKey->stateid = $statename->statename;
            $productKey->cityid = $cityname->cityname;
            // $productKey->localitie_id = $localitie_name->localitie_name;
            $randProduct[] = $productKey;
         }
        // return $randProduct;
        return view('admin.users.index',compact('randProduct'));
    }
    public function create(Request $request)
    {
        return view('admin.users.create');
    }

     public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
        return view('admin.users.edit');
    }

     public function show(){
        return view('admin.users.viewUsers');
    }

    public function update(Request $request, $id,lsCategory $lsCategory)
    {
        
       
    }

    public function destroy($id)
    {
       
        
    }
    public function getPartnerDetails($id)
    {
       return $id;
        
    }
}
