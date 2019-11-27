<?php

namespace App\Http\Controllers\Api\v1\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Http\Traits\PartnerAuthTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use PartnerAuthTraits;

    public function login(Request $request)
    {
    	$validate = $this->validateLogin($request->all());
    	if($validate->fails()){
    		return $this->sendError("Validation Error.",$validate->errors()->first(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
    	}

    	$credentials = $this->credentials($request);
    	$username = $this->username($request->get('username'));
    	// return json_encode($credentials);
    	if(Auth::guard('partner_api')->attempt($credentials)){
    		$user = Auth::guard('partner_api')->user();
    		$success = json_decode($this->issueToken($request,'password')->getContent(),true);
            $success['user'] = new PartnerResource($user);
    		// $success['access_token'] =  $user->createToken('AppName')->accessToken;
    		return $this->sendResponse($success,"Login Successful.");    		
    	}
    	else{
    		if($credentials[$username] == 'inactive'){
    			return $this->sendError("inactive.",["error"=>'You Are Not Active User, Please Wait for Admin Approval.'],200);// Error Code 401-HTTP_UNAUTHORIZED
    		}
    		return $this->sendError("Unauthorised.",["error"=>'Please check credential.'],200);
    		// Error Code 401-HTTP_UNAUTHORIZED 
    	} 
    	return $this->sendError("Something Went's Wrong.",['error'=>"Login fails."],200);
    }

    public function refresh(Request $request)
    {
    	$validate = Validator::make($request->all(), [
			    		'refresh_token' => 'required'
			    	]);
    	if($validate->fails())
    	{
    		return $this->sendError("Validation Error.",$validate->errors(),200);
    	}
    	$success = json_decode($this->issueToken($request, 'refresh_token')->getContent(),true);
    	return $this->sendResponse($success,"Token is Refresh.",200);
    }

    public function logout()
    {
    	$accessToken = Auth::user()->token();
    	DB::table('oauth_refresh_tokens')
    		->where('access_token_id', $accessToken->id)
    		->update(['revoked' => true]);
    	$accessToken->revoke();
    	return $this->sendResponse([],"Logout Successfully.");
    }
}
