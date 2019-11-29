<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\lsCategory;
use App\Model\lsSubCategory;
use App\Model\lsService;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Model\lsProductCategory;
use App\Model\lsAdharcard;
use App\Model\lsPartner;
use App\Model\lsPartnerCategoryAndPrice;
use App\Model\lsPartnerAdharcard;
use App\Model\lsServiceCity;
use App\Model\lsServiceImage;
use App\Model\lsServiceLocality;
use App\Model\lsServicePrice;
use App\Model\lsServiceSpecialprice;

class TestDataController extends Controller
{
    //
	public function index()
	{
    			return $data;
	}
	public function getCat(Request $request)
	{
    	
		$allCat = lsCategory::get(); 

		return $this->sendResponse($allCat,'Successfully get Category.',200);


	}

	public function getSub(Request $request)
	{
		$v = Validator::make($request->all(), [
			'cid'=>'required',
    		// 'body' => 'required',
		]);
    	if ($v->fails()) { // if validation fails than
    		return $this->sendError('Data Error.', 'cname is required or Not Available',200);
    	}
    	$id = $request->input();
    	$allCat = lsCategory::get(); 

    	$subCat = lsSubCategory::where('cid',$id)->get();

    	foreach ($subCat as $key => $getProduct){
    		$getProduct->cid = lsCategory::where('cid',$id)->select('cname')->first();
    	}
    	// return $subCat;
    	// exit();

    	$len = strlen($subCat);

    	if(strlen($subCat) > 2){
    		return $this->sendResponse($subCat,'Successfully get Sub Category.',200);
    	}else{
    		
    		return $this->sendError('data Error.', 'Sorry data not found',200);
    	}
    	
    }


    public function getServices(Request $request)
    {
    	$v = Validator::make($request->all(), [
    		'scid'=>'required',
    		'cid'=>'required',
    		// 'body' => 'required',
    	]);
    	if ($v->fails()) {
    		return $this->sendError('Data Error.', 'Service Name is required or Not Available',200);
    	}

    	$cid = $request->input('cid');
    	$scid = $request->input('scid');
    	$getSer = lsService::where('cid',$cid)
        ->where('scid',$scid)
                ->join('ls_service_prices','ls_service_prices.sid','=','ls_services.sid')
                ->join('ls_service_specialprices','ls_service_specialprices.sid','=','ls_services.sid')
               ->get();
    			// exit();
    	if(strlen($getSer) > 2){
    		return $this->sendResponse($getSer,'Successfully get getServices.',200);
    	}
    	else{
    		return $this->sendError('data Error.', 'Sorry data not found',200);
    	}
    }

    public function getProdcutSer(Request $request)
    {
    	$v = Validator::make($request->all(), [
    		'scid'=>'required',
    		// 'cid'=>'required',
    		// 'body' => 'required',
    	]);
    	if ($v->fails()) {
    		return $this->sendError('Data Error.', 'Product Service Name is required or Not Available',200);
    	}
    	$scid = $request->input('scid');
    	$getProSer = lsProductCategory::where('scid',$scid)
    	// ->where('scid',$scid)
    			// ->select('sname')
    	->get();

    	if(strlen($getProSer) > 2){
    		return $this->sendResponse($getProSer,'Successfully get Product Services.',200);
    	}
    	else{
    		return $this->sendError('data Error.', 'Sorry data not found',200);
    	}
    }

    
    public function getAadhar(Request $request)
    {
        $v = Validator::make($request->all(), [
            'aaimage_back'=>'required',
            'aaimage_front'=>'required',
            'pid'=>'required',
        ]);
        if ($v->fails()) {
            return $this->sendError('Data Error.', 'aaimage_back is required or Not Available',200);
        }
        $data = new lsAdharcard;
        $data->aaimage_back = $request->input('aaimage_back');
        $data->aaimage_front = $request->input('aaimage_front');
        $data->pid = $request->input('pid');
        $data->save();

        return $data;
        exit();

        $img = $request->input('aaimage_front');
        $getAadh = lsAdharcard::where('aaimage_front',$img)
        // ->where('scid',$scid)
                // ->select('sname')
        ->get();

        if(strlen($getAadh) > 2){
            return $this->sendResponse($getAadh,'Successfully get AadharCard back.',200);
        }
        else{
            return $this->sendError('data Error.', 'Sorry data not found',200);
        }
    }
//partner , here all data come form the different places...(database).
    public function storePartnerData(Request $request)
    {
        $v = Validator::make($request->all(), [
            'cid'=>'required',
            'scid'=>'required',
            'pcid'=>'required',
            'sid'=>'required',
            'pid'=>'required',
            'aacid'=>'required',
           
        ]);

        if ($v->fails()) {
            return $this->sendError('Data Error.', 'data is required or Not Available',200);
        }
        return $request;
        
        $ParAddharIMG = new lsPartnerAdharcard;
        $ParAddharIMG->partner_id;
        $ParAddharIMG->aacid;
        $ParAddharIMG->save();

        
    }

    public function getPartnerProfile(Request $request)
    {
        $pid = $request->input('pid');
        $v = Validator::make($request->all(), [
            'pid'=>'required',
            
        ]);
        if ($v->fails()) {
            return $this->sendError('Data Error.', 'Parnter Id is required or Not Available',200);
        }
        $partnerProfile = lsPartner::where('pid',$pid)->get();

        foreach ($partnerProfile as $key => $pp){
            $pid = $pp->pid;
            $pp->prices = lsPartnerCategoryAndPrice::where('partner_id',$pid)->get();
        }
        // foreach ($partnerProfile as $key => $pp){
        //     $pid = $pp->pid;
        //     $pp->prices = lsPartnerCategoryAndPrice::where('partner_id',$pid)->get();
        // }

        if(strlen($partnerProfile) > 2){
            return $this->sendResponse($partnerProfile,'Successfully get Partner Profile.',200);
        }
        else{
            return $this->sendError('data Error.', 'Sorry data not found',200);
        }

        return $partnerProfile;
    }
    public function sendResponse($result, $message,$code=200)
    {
    	$response = [
    		'status' => true,
    		'message' => $message,
    		'data'    => $result,
    	];

    	return response()->json($response,$code);
    }


    public function sendError($error, $errorMessages = [], $code = 200)
    {
    	$response = [
    		'status' => false,
    		'message' => $error,
    	];


    	if(!empty($errorMessages)){
    		$response['errors'] = $errorMessages;
    	}

    	return response()->json($response, $code);
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
            $new['image_id'] = isset($services_images->siid)?$services_images->siid:null;
            $new['images'] = isset($services_images->siImage)?$services_images->siImage:null;

            $services_localities = lsServiceLocality::where('sid',$service->sid)->first();
            $new['locality_id'] = isset($services_localities->localitieid)?$services_localities->localitieid:null;
            $new['locality_name'] = isset($services_localities->localitie_name)?$services_localities->localitie_name:null;

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
    }

}

