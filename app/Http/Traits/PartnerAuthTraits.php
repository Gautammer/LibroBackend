<?php
namespace App\Http\Traits;


use App\Model\lsCity;
use App\Model\lsPartner;
use App\Notifications\SendOTPNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;


trait PartnerAuthTraits
{
    protected function validateLogin(array $data){
    	if(empty($data['username'])){
    		return validator::make($data,[
    			"username"=>'required',
    		]);
    	}
    	
    	$field = $this->username($data['username']);

    	return Validator::make($data, [
            'username' => ['required',"exists:ls_partners,$field"],
            'password' => ['required'],
        ],[
        	'username.required' => "Please Enter your Username.",
        	'username.exists' => "This ".$data['username']." is not in our Records.",
        ]);
    }

    protected function username($username)
    {
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'pemail' : 'pmobileno';
    }

    protected function credentials(Request $request)
    {
    	$UserIsActive = lsPartner::where($this->username($request->get('username')),$request->get('username'))->first();

    	if(!empty($UserIsActive)){
    		if($UserIsActive->is_approved == '0'){
    			return [$this->username($request->get('username'))=>'inactive'];
    		}
    		else{
    			return [$this->username($request->get('username'))=>$request->get('username'),'password'=>$request->password,'is_approved'=>'1'];
    		}
    	}
        return $request->only($this->username($request->get('username')), 'password');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pname' => ['required', 'string', 'max:255'],
            'pemail' => ['required', 'string', 'email', 'max:255', 'unique:ls_partners'],
            'pmobileno' => ['required', 'string', 'unique:ls_partners'],
            'cityid' => ['required'],
            'password' => ['required', 'string', 'min:8',],
        ],[
        	'pname.required' => "Please Enter your Username.",
        	'pemail.required' => "Please Enter your Email Address.",
        	'pemail.unique' => "The Email has already been taken.",
        	'pmobileno.required' => "Please Enter your Mobile Number.",
        	'pmobileno.unique' => "The Mobile Number has already been taken.",
        	'cityid.required' => "Please Choose your City.",
        	'password.min' => "The Password must be at least 8 characters."
        ]);
    }

    protected function create(array $data)
    {
    	$stateid = lsCity::find($data['cityid'])->stateid;
        $user = lsPartner::create([
            'pname' => $data['pname'],
            'pemail' => $data['pemail'],
            'pmobileno' => $data['pmobileno'],
            'stateid' => $stateid,
            'cityid' => $data['cityid'],
            'password' => Hash::make($data['password']),
            'otp' => mt_rand(100000,999999),
        ]);

        return $user;
    }

    public function issueToken(Request $request, $grantType, $scope = ""){
		$params = [
    		'grant_type' => $grantType,
    		'client_id' => $this->client->id,
    		'client_secret' => $this->client->secret,    		
    		'scope' => $scope,
            'username' => $request->username,
            'password' => $request->password,
    	];
    	$request->request->add($params);
    	$proxy = Request::create('oauth/token', 'POST');

    	return Route::dispatch($proxy);
	}
}


