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
use App\Model\lsCity;
use App\model\lsUserRegistration;
use Illuminate\Support\Collection;

class UserDataController extends Controller
{
    // get user data based in the user cities 
    public function getUserCatData(Request $request)
    {
    		$v = Validator::make($request->all(), [
    		'uid'=>'required',
    	]);
    	if ($v->fails()) {
    		return $this->sendError('Data Error.', 'Service Name is required or Not Available',200);
    	}

    	$data = lsUserRegistration::where('uid',$request->input('uid'))->Where('usertype','1')->get();
    	$da = $data->first();
    	if(strlen($data) > 2){
    		$cityId = $da->cityid;
    	}else{
    		$cityId = 0;
    	}
    	// return $cityId;exit();
    	$getCatDataBaseOnCID = lsCategory::where('cityid', $cityId)
    							->join('ls_sub_categories','ls_sub_categories.cid', '=', 'ls_categories.cid')
    							
    							->get();
    							if(strlen($data) > 2 ){
    								return $this->sendResponse($getCatDataBaseOnCID,'Successfully get cat back.',200);
    							}
    							else{
    								return $this->sendError('data Error.', 'Sorry data not found',200);
    							}
    							
    							// return $getCatDataBaseOnCID;
    							
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
    			// ->select('sname')
    	->get();

    			// exit();
    	if(strlen($getSer) > 2){
    		return $this->sendResponse($getSer,'Successfully get getServices.',200);
    	}
    	else{
    		return $this->sendError('data Error.', 'Sorry data not found',200);
    	}
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

}
