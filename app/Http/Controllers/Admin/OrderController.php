<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //

    public function index()
    {
       
        return view('admin.orders.index');
    }
    

    public function destroy($id)
    {
       
        
    }

 public function show()
    {
       
        return view('admin.orders.viewOrder');
    }


}
