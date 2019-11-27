<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}

	public function showLogin()
	{
		return view('admin.login');
	}

	public function login(Request $request)
	{
		$validate = Validator::make($request->all(), [
            // 'uemail'   => 'required|email|exists:ls_user_registrations,uemail',
            'uemail'   => [	'required',
            				'email',
					        Rule::exists('ls_user_registrations')
							        ->where(function ($query) {
							            $query->where('usertype','=', '0')
							            	->orWhere('usertype','=','2');
							        })
					    ],
            'password' => 'required'
        ],
    	[
    		'uemail.exists' => 'Email is invalid.',
    		'uemail.required' => 'The Email is required.',
    		'uemail.email' => 'Please enter valid email.',
    	]);

		if($validate->fails())
		{
			return json_encode(['status'=>false,'msg'=>"Validation Error.",'errors'=>$validate->errors()->first()]);
		}
        if (Auth::guard('admin')->attempt(['uemail' => $request->uemail, 'password' => $request->password], $request->get('remember'))) {

			return json_encode(['status'=>true,'msg'=>"Login Successful."]);
        }
		return json_encode(['status'=>'mismatch','msg'=>"Credetial does not match,Please try again."]);
	}

	public function logout(Request $request)
	{
		Auth::guard('admin')->logout();
		return redirect()->route('admin.login');
	}
}
