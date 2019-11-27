<?php

namespace App\Http\Controllers\Api\v1\Partner\Auth;

use App\Http\Controllers\Api\v1\User\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Http\Traits\PartnerAuthTraits;
use App\Model\lsPartner;
use App\Notifications\SendOtpToPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    use PartnerAuthTraits;

    public function register(Request $request)
    {
    	$validator = $this->validator($request->all()); // Validate Data 
    	if ($validator->fails()) { // if validation fails than
        	return $this->sendError('Validation Error.', $validator->errors()->first(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }
        
        $user = $this->create($request->all());
        $data = new PartnerResource($user);
        
        // Send Verification OTP on User Mobile.
        // With User Details. Now here we send Email to user for testing purpose.
        $user->notify(new SendOtpToPartner($user));
        return $this->sendResponse($data,'Verification OTP is Send on Your Mobile Number,Please Enter Verification Code to Active Your Account.',200); //error code 201-HTTP_CREATED
    }

    public function activeAccount(Request $request)
    {
    	$validate = Validator::make($request->all(),[
	            'phone' => ['required',"exists:ls_partners,pmobileno"],
	            'otp' => ['required'],
	        ],[
	        	'phone.exists' => "This phone number is not in our Records.",
	        ]);

        if($validate->fails()){
        	return $this->sendError("Validation Error.",$validate->errors()->first(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }

        $user =lsPartner::where(['pmobileno'=>$request->get('phone')])->first();
        if($user->is_active == '0'){       	
	        if($request->otp == $user->otp){
		        $userActive = lsPartner::where(['pmobileno'=>$request->phone])
		        					->update(['is_active'=>'1']);
		        return $this->sendResponse([],"Your Account Activated.",200);
		        // Error Code 202-HTTP_ACCEPTED
	        }
	        else{
	        	return $this->sendError("OTP is Not Match,Please try again.","Unprocessable Entity",200);
        		// Error Code 422-HTTP_UNPROCESSABLE_ENTITY
	        }
        }
        return $this->sendError("User is Already Active.",[],200);
        // Error Code 422-HTTP_UNPROCESSABLE_ENTITY
    }

    public function resendOTP(Request $request)
    {
    	$validate = Validator::make($request->all(),[
	            'phone' => ['required',"exists:ls_partners,pmobileno"],
	        ],[
	        	'phone.exists' => "This phone number is not in our Records.",
	        ]);

        if($validate->fails()){
        	return $this->sendError("Validation Error.",$validate->errors()->first(),200);
        	// error code 422-HTTP_UNPROCESSABLE_ENTITY
        }

    	$findUser = lsPartner::where(['pmobileno'=>$request->get('phone')])->first();
    	$OTP = mt_rand(100000,999999);
    	if($findUser){
    		$setOTP = lsPartner::where(['pmobileno'=>$request->phone])
    						->update(['otp'=>$OTP]);
    		$user = lsPartner::where(['pmobileno'=>$request->get('phone')])->first();

    		// Send Verification OTP on User Mobile.
        	// With User Details. Now here we send Email to user for testing purpose.
			$user->notify(new SendOtpToPartner($user));
    		return $this->sendResponse([],"OTP is Send to Your Mobile Number.",200);
    	}
		return $this->sendError("Something Went's Worng.",['error'=>'User Not Found'],200);
		// Error Code 422-HTTP_UNPROCESSABLE_ENTITY
    }

    
}
