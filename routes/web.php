<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/viewOrder', function () {
//     return view('admin.orders.viewOrder');
// });


Route::group(['prefix'=>'admin/','namespace'=>'Admin','as'=>'admin.'],function(){
	
	Route::group(['namespace'=>'Auth'],function(){
		Route::get('/login','AuthController@showLogin')->name('showLogin');
		Route::post('/login','AuthController@login')->name('login');
	});

	Route::group(['middleware'=>'auth:admin'],function(){
		Route::post("/logout",'Auth\AuthController@logout')->name('logout');
		
		Route::get("/",'HomeController@index');
		Route::get("/dashboard",'HomeController@index')->name('dashboard');
		Route::resource("/category",'CategoryController');
		Route::resource("/SubCategory",'SubCategoryController');
		Route::resource("/ProductCategory",'ProductCategoryController');
		Route::resource("/offers",'OfferController');
		Route::resource("/users",'UsersController');
		Route::resource("/orders",'OrderController');
		Route::resource("/services",'ServiceController');
		Route::resource("/Partner",'PartnerController');
		// Route::resource("/PartnerView",'PartnerController@show');
		// Route::get("/partnerView",'PartnerController@show')->name('partnerView');
		Route::get('/partnerView/{id}', 'PartnerController@getPartnerDetails')->name('partnerView');
		Route::get('/users/{id}', 'UsersController@getPartnerDetails')->name('users');

		// Route::resource("/offers",'admin.offers');
	});
});

