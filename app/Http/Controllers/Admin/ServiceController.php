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
use App\Model\lsState;
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
        $listServices = lsService::all();
         // $listServices->cityid = lsServiceCity::where('sid',$listServices->sid)->get();
        foreach ($listServices as $key => $lse){
            $id = $lse->sid;
            $lse->cityid = lsServiceCity::where('sid',$id)->select('cityname')->get();
           
        }
        foreach ($listServices as $key => $lse){
            $cid = $lse->cid;
            $lse->cid = lsCategory::where('cid',$cid)->select('cname')->get();
           
        }
        foreach ($listServices as $key => $lse){
            $scid = $lse->scid;
            $lse->scid = lsSubCategory::where('scid',$scid)->select('scname')->get();
           
        }
        foreach ($listServices as $key => $lse){
            $pcid = $lse->scid;
            $lse->pcid = lsProductCategory::where('pcid',$scid)->select('pcname')->get();
           
        }
        foreach ($listServices as $key => $lse){
            $stateid = $lse->stateid;
            $lse->stateid = lsState::where('stateid',$stateid)->select('statename')->get();
           
        }
        // return $listServices;
        return view('admin.services.index',compact('listServices'));
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

    public function showservice(){
        $services = lsService::all();
        $responce = array();
        // return "hi";
        // exit();
        foreach($services as $service){
            $new = array();
            $cat_name = DB::table('ls_categories')->select('cname')->where('cid',$service->cid)->first();
            $subcat_name = DB::table('ls_sub_categories')->select('scname')->where('scid',$service->scid)->first();
            $product_name = DB::table('ls_product_categories')->select('pcname')->where('pcid',$service->pcid)->first();
     
            $new['service_id']  = $service->sid;
            $new['service_name']  = $service->sname;
            $new['service_id']  = $service->sid;
            $new['category_id'] = $service->cid;
            $new['category_name']  = $cat_name->cname;
            $new['subcat_id']  = $service->scid;
            $new['subcat_name']  = $subcat_name->scname;
            $new['product_id'] = $service->pcid;
            $new['product_name'] = $product_name->pcname;
            $new['service_detail'] = $service->sdetails;
            $new['sp_status']= $service->sp_details;
            $new['uid']= $service->uid;
            $new['update_id']= $service->updateid;
            $new['status']= $service->status;
            $new['created_at']= $service->created_at;
            $new['updated_at']= $service->updated_at;

            $services_cities  = lsServiceCity::where('sid',$service->sid)->first();
            $new['city_id']=$services_cities->cityid;
            $new['city_name']=$services_cities->cityname;

            $services_images = lsServiceImage::where('sid',$service->sid)->first();
            $new['image_id'] = $services_images->siid;
            $new['images'] = $services_images->siImage;

            $services_localities = lsServiceLocality::where('sid',$service->sid)->first();
            $new['locality_id'] = $services_localities->localitieid;
            $new['locality_name'] = $services_localities->localitie_name;

            $services_sprice = lsServicePrice::where('sid',$service->sid)->first();
            $new['city_id_for_price']=$services_sprice->cityid;
            $new['service_price']=$services_sprice->sprice;

            $services_specialprice = lsServiceSpecialprice::where('sid',$service->sid)->first();
            if ($services_specialprice === null) {
                $new['special_price'] = "Not Availabel";
             }
             else{
                $new['special_price_city'] = $services_specialprice->cityid;
                $new['special_price'] = $services_specialprice->sp_specialprice;
             }
           
            array_push($responce,$new);
        }
        return $responce;
        //return json_encode($services_cities);
        //return json_encode($services);
    }   

}
