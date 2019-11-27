<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    //
     public function index()
    {
       
        return view('admin.offers.index');
    }
    public function create(Request $request)
    {
        return view('admin.offers.create');
    }

     public function store(Request $request)
    {
        
    }

    public function edit()
    {
        // echo $id;
        // exit();
        return view('admin.offers.edit');
    }

     public function show($id){
        return $id;
    }

    public function update(Request $request, $id,lsCategory $lsCategory)
    {
        
       
    }

    public function destroy($id)
    {
       
        
    }

}
