<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});

Route::group(['namespace' => 'Api\v1'],function(){
	
	Route::group(['prefix'=>'v1'],function(){

		Route::get('/getCities','User\AuthController@cities');

		//this is route for "User App"
		Route::group(['prefix'=>'oauth'],function(){
			Route::post('/register','User\AuthController@register');
			Route::post('/activeAccount','User\AuthController@activeAccount');
			Route::post('/resendOTP','User\AuthController@resendOTP');
			Route::post('/login','User\AuthController@login');
			Route::post('/refresh', 'User\AuthController@refresh');
			Route::post("/logout",'User\AuthController@logout')->middleware('auth:api');	
		});

		Route::group(['middleware'=>'auth:api'],function(){
				
		});
		Route::get('v1/SubCategories', 'v1\AJAXController@SubCategories')->name('GetSubCategories');
	Route::get('v1/ProductCategories', 'v1\AJAXController@ProductCategories')->name('GetProductCategories');
	Route::get('v1/Localities', 'v1\AJAXController@Locality')->name('GetLocalities');

		//this is route for "Partner App"
		Route::group(['prefix'=>'partner'],function(){
			Route::group(['prefix'=>'oauth','namespace'=>'Partner\Auth'],function(){
				Route::post('/register','RegisterController@register');
				Route::post('/activeAccount','RegisterController@activeAccount');
				Route::post('/resendOTP','RegisterController@resendOTP');
				Route::post('/login','LoginController@login');
				Route::post('/refresh', 'LoginController@refresh');
				Route::post("/logout",'LoginController@logout')->middleware('auth:partner_api');
			});

			Route::group(['middleware'=>'auth:partner_api'],function(){

			});
		});
	});
});

Route::get('/category', function(){

	$cat = [
		'cname' => 'Elcetron',
		'cid' => '2',
	];

	return $cat;
});

Route::get('/test',"Api\TestDataController@index");
Route::post('/testCat',"Api\TestDataController@getCat");
Route::post('/testSub',"Api\TestDataController@getSub");
Route::post('/testSer',"Api\TestDataController@getServices");
Route::post('/testProSer',"Api\TestDataController@getProdcutSer");
Route::post('/testAadhar',"Api\TestDataController@getAadhar");
Route::post('/testUserData',"Api\UserDataController@getUserCatData");
Route::post('/partnerProfile',"Api\TestDataController@getPartnerProfile");
Route::post('/storePartnerProfile',"Api\TestDataController@storePartnerData");
Route::psot('/showservice', 'Api\TestDataController@showservice');


// Route::post('/getServices',"Api\UserDataController@getServices");
// Route::post('/testUserSer',"Api\UserDataController@getUserServices");
