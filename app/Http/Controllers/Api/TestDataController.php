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
