<?php
namespace App\Http\Traits;


use App\Model\lsCity;
use App\Notifications\SendOTPNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;


trait AuthTraits
{
    protected function validateLogin(array $data){
    	if(empty($data['username'])){
    		return validator::make($data,[
    			"username"=>'required',
    		]);
    	}
    	
    	$field = $this->username($data['username']);

    	return Validator::make($data, [
            'username' => ['required',"exists:ls_user_registrations,$field"],
            'password' => ['required'],
        ],[
        	'username.required' => "Please Enter your Username.",
        	'username.exists' => "This ".$data['username']." is not in our Records.",
        ]);
    }

    protected function username($username)
    {
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'uemail' : 'umobileno';
    }

    protected function credentials(Request $request)
    {
    	$UserIsActive = User::where($this->username($request->get('username')),$request->get('username'))->first();

    	if(!empty($UserIsActive)){
    		if($UserIsActive->is_active == '0'){
    			return [$this->username($request->get('username'))=>'inactive'];
    		}
    		else{
    			return [$this->username($request->get('username'))=>$request->get('username'),'password'=>$request->password,'is_active'=>'1'];
    		}
    	}
        return $request->only($this->username($request->get('username')), 'password');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'uname' => ['required', 'string', 'max:255'],
            'uemail' => ['required', 'string', 'email', 'max:255', 'unique:ls_user_registrations'],
            'umobileno' => ['required', 'string', 'unique:ls_user_registrations'],
            'cityid' => ['required'],
            'upassword' => ['required', 'string', 'min:8',],
        ],[
        	'uname.required' => "Please Enter your Username.",
        	'uemail.required' => "Please Enter your Email Address.",
        	'uemail.unique' => "The Email has already been taken.",
        	'umobileno.required' => "Please Enter your Mobile Number.",
        	'umobileno.unique' => "The Mobile Number has already been taken.",
        	'cityid.required' => "Please Choose your City.",
        	'upassword.min' => "The Password must be at least 8 characters."
        ]);
    }

    protected function create(array $data)
    {
    	$stateid = lsCity::find($data['cityid'])->stateid;
        $user = User::create([
            'uname' => $data['uname'],
            'uemail' => $data['uemail'],
            'umobileno' => $data['umobileno'],
            'stateid' => $stateid,
            'cityid' => $data['cityid'],
            'password' => Hash::make($data['upassword']),
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
/*         print_r($params);
        exit();
    	$request->request->add($params);
    	$proxy = Request::create('oauth/token', 'POST'); */
        $loginOk= collect($params);
    	return $loginOk;
	}
}


