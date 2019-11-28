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
use App\Model\lsCategory;
use App\Model\lsSubCategory;
use App\Model\lsCity;
use App\Model\lsLocality;
use App\Model\lsProductCategory;
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
         $category = lsCategory::all();
         $cities = lsCity::all(); 
         //return $category;    
          return view('admin.services.create',compact('category', 'cities'));

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
        'img_upload[]' => '',
        'img_upload.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
    //    $cid = DB::table('ls_categories')->select('cid')->where('cname',$request->input('cname'))->first();
    //    $sid = DB::table('ls_sub_categories')->select('scid')->where('scid',$request->input('subcat'))->where('cid',$cid->cid)->first();
    //    $procid = DB::table('ls_product_categories')->select('pcid')->where('pcid',$request->input('proname'))->where('scid',$sid->scid)->first();
       $service = new lsService;
       $service->sname =  $request->input('sname');
       $service->cid = $request->cname;
       $service->scid = $request->subcat;
       $service->pcid = $request->proname;
       $service->sdetails = $request->input('sdetail');
       $service->stateid = 1;
       $service->updateuid = 1;
       $service->uid = 1;
       $service->save();

       $cityid = DB::table('ls_cities')->select('cityname')->where('cityid',$request->cityname)->first();
       $service_city = new lsServiceCity;
       $service_city->sid = $service->sid;
       $service_city->cityid = $request->cityname;
       $service_city->cityname = $cityid->cityname;
       $service_city->save();

       $service_image = new lsServiceImage;
       $service_image->sid = $service->sid;
       $service_image->siimage = implode(',',$data);
       $service_image->save();

       $locality_id = DB::table('ls_localities')->select('localitie_name')->where('localitie_id',$request->locality)->first();
       $service_localities = new lsServiceLocality;
       $service_localities->sid = $service->sid;
       $service_localities->localitie_name = $locality_id->localitie_name;
       $service_localities->localitieid = $request->locality;
       $service_localities->save();
       
       $service_price = new lsServicePrice;
       $service_price->sid = $service->sid;
       $service_price->cityid = $request->cityname;
       $service_price->sprice = $request->input('price');
       $service_price->updateuid = 1;
       $service_price->save();

       $service_sprice = new lsServiceSpecialprice;
       $service_sprice->sid = $service->sid;
       $service_sprice->cityid = $request->cityname;
       $service_sprice->sp_specialprice = $request->input('sprice');
       $service_sprice->updateuid = 1;
       $service_sprice->save();
    
       
    //    $service->
       //return  $request->input('sname');
       return redirect()->route('admin.services.index')->with('succes','SuccessFully Add Service');
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

    public function SubCategories(Request $request) {
        $SubCategories = lsSubCategory::select('scid', 'scname')->where('cid', $request->id)->get();
        $scat=[];
        $d = '<option disabled selected value>Select SubCategory Name</option>';
        echo $d;
        foreach($SubCategories as $scategorie){
            $scat = '<option value="'.$scategorie->scid.'">'.$scategorie->scname.'</option>';
            echo $scat;
        }
        return $SubCategories;
    }
    public function productCategory(Request $request) {
      $productCategory = lsProductCategory::select('pcid', 'pcname')->where('scid', $request->id)->get();
      $pcat=[];
      $d = '<option disabled selected value>Select Product Category</option>';
      echo $d;

      foreach($productCategory as $pcategorie){
        $pcat = '<option value="'.$pcategorie->pcid.'">'.$pcategorie->pcname.'</option>';

        echo $pcat;

      }
        // $productCategory
        return $productCategory;
        // exit();
    }
    public function getCities(Request $request) {
      $getLocality = lsLocality::select('localitie_id', 'localitie_name')->where('cityid', $request->id)->get();
      $pcat=[];
      $d = '<option disabled selected value>Select Locality</option>';
      echo $d;
      
      foreach($getLocality as $localite){
        $pcat = '<option value="'.$localite->localitie_id.'">'.$localite->localitie_name.'</option>';
        
        echo $pcat;

      }
        // $productCategory
        return $getLocality;
        // exit();
    }
}
