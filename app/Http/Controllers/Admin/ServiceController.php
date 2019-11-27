<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect,Response,File;
use App\Model\lsService;
use App\Model\lsServiceCity;
use App\Model\lsServiceImage;
use App\Model\lsServiceLocality;
use App\Model\lsServicePrice;
use App\Model\lsServiceSpecialprice;
use DB;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'img_upload' => 'required',
        'img_upload.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
       ]);

       $files = $request->file('img_upload');
       foreach($files as $file)
       {
           // return $file;
           $FileName = time() . $file->getClientOriginalName();
           
           //Move Uploaded File
        //    $destinationPath = 'public/images';
        //    $file->storeAs($destinationPath, $FileName, 'public');
           $destinationPath = 'images';
           $file->move($destinationPath,$FileName);
           $data[] = $FileName;  
       }
       $cid = DB::table('ls_categories')->select('cid')->where('cname',$request->input('cname'))->first();
       $service = new lsService;
       $service->sname =  $request->input('sname');
       $service->cid = $cid->cid;
       $service->stateid = 1;
       $service->uid = 1;
       $service->save();
       
    //    $service->
       //return  $request->input('sname');
     //  return $cid;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
