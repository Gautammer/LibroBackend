<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Api\v1\User\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Traits\AuthTraits;
use App\Model\lsCity;
use App\Notifications\SendOTPNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class AuthController extends BaseController
{
	use AuthTraits; // for validate user details and create user.

	private $client;
	
	public function __construct(){
		$this->client = Client::find(2);
	}

    public function register(Request $request)
    {
    	$validator = $this->validator($request->all()); // Validate Data 
    	if ($validator->fails()) { // if validation fails than
        	return $this->sendError('Validation Error.', $validator->errors(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }
        
        $user = $this->create($request->all());
        $data = new UserResource($user);
        
        // Send Verification OTP on User Mobile.
        // With User Details. Now here we send Email to user for testing purpose.
        $user->notify(new SendOTPNotification($user));
        return $this->sendResponse($data,'Verification OTP is Send on Your Mobile Number,Please Enter Verification Code to Active Your Account.',200); //error code 201-HTTP_CREATED
    }

    public function login(Request $request)
    {
    	$validate = $this->validateLogin($request->all());
    	if($validate->fails()){
    		return $this->sendError("Validation Error.",$validate->errors(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
    	}

    	$credentials = $this->credentials($request);
    	$username = $this->username($request->get('username'));

    	if(Auth::attempt($credentials)){
    		$user = Auth::user();
    		$success = json_decode($this->issueToken($request,'password')->getContent(),true);
            $success['user'] = new UserResource($user);
    		// $success['access_token'] =  $user->createToken('AppName')->accessToken;
    		return $this->sendResponse($success,"Login Successful.");    		
    	}
    	else{
    		if($credentials[$username] == 'inactive'){
    			return $this->sendError("Unauthorised.",["error"=>'You Are Not Active User, Please Verify your Mobile Number.'],200);// Error Code 401-HTTP_UNAUTHORIZED
    		}
    		return $this->sendError("Unauthorised.",["error"=>'Please check credential.'],200);
    		// Error Code 401-HTTP_UNAUTHORIZED 
    	} 
    	return $this->sendError("Something Went's Wrong.",['error'=>"Login fails."],200);
    }

    public function activeAccount(Request $request)
    {
    	$validate = Validator::make($request->all(),[
	            'phone' => ['required',"exists:ls_user_registrations,umobileno"],
	            'otp' => ['required'],
	        ],[
	        	'phone.exists' => "This phone number is not in our Records.",
	        ]);

        if($validate->fails()){
        	return $this->sendError("Validation Error.",$validate->errors(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }

        $user =User::where(['umobileno'=>$request->get('phone')])->first();
        if($user->is_active == '0'){
	        // return $user->otp;        	
	        if($request->otp == $user->otp){
		        $userActive = User::where(['umobileno'=>$request->phone])
		        					->update(['is_active'=>'1']);
		        return $this->sendResponse([],"Your Account Activated.",200);
		        // Error Code 202-HTTP_ACCEPTED
	        }
	        else{
	        	return $this->sendError("OTP is Not Match,Please try again.",["error"=>"Unprocessable Entity"],200);
        		// Error Code 422-HTTP_UNPROCESSABLE_ENTITY
	        }
        }
        return $this->sendError("User is Already Active.",[],200);
        // Error Code 422-HTTP_UNPROCESSABLE_ENTITY
    }

    public function resendOTP(Request $request)
    {
    	$validate = Validator::make($request->all(),[
	            'phone' => ['required',"exists:ls_user_registrations,umobileno"],
	        ],[
	        	'phone.exists' => "This phone number is not in our Records.",
	        ]);

        if($validate->fails()){
        	return $this->sendError("Validation Error.",$validate->errors(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }

    	$findUser = User::where(['umobileno'=>$request->get('phone')])->first();
    	$OTP = mt_rand(100000,999999);
    	if($findUser){
    		$setOTP = User::where(['umobileno'=>$request->phone])
    						->update(['otp'=>$OTP]);
    		$user = User::where(['umobileno'=>$request->get('phone')])->first();

    		// Send Verification OTP on User Mobile.
        	// With User Details. Now here we send Email to user for testing purpose.
			$user->notify(new SendOTPNotification($user));
    		return $this->sendResponse([],"OTP is Send to Your Mobile Number.",200);
    	}
		return $this->sendError("Something Went's Worng.",['error'=>'User Not Found'],200);
		// Error Code 422-HTTP_UNPROCESSABLE_ENTITY
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

    public function cities()
    {
        $cities = lsCity::select(['cityid','cityname'])->get();
        return $this->sendResponse($cities,"City's are here.");
    }
}
