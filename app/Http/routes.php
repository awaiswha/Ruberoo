<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middlewareGroups' => 'web'], function () {

   // index page
   Route::get('/', 'AuthController@index');

   Route::post('public/login', 'AuthController@auth_login');
   Route::post('public/forget_password', 'AuthController@reset_password');
   Route::post('public/registration', 'UserRegisterController@register_submit');
   Route::get('logout', 'AuthController@logut');
   Route::post('user/update_profile', 'UserProfileController@update_profile');
   Route::get('check_password/{password}', 'UserProfileController@check_password');
   Route::post('user/change_password', 'UserProfileController@change_password');

   Route::get('user/profile/{user_id}', 'UserProfileController@user_profile');
   // banner upload
   Route::post('user/upload_banner', 'UserProfileController@banner_upload');

	Route::group(['middleware' => 'unAuthenticated'], function() {

		Route::get('login/{project_id?}', 'AuthController@login_page');
		Route::get('administrator', 'AuthController@admin_login_page');

   });

	Route::group(['middleware' => 'adminAuth'], function() {
      // admin login
      Route::get('admin/dashboard', 'AdminController@dashboard');
      // categoreis
      Route::post('user/add_category', 'SellerCatController@submit_category');
      Route::post('user/update_category', 'SellerCatController@update_category');
      Route::get('cat/delete/{cat_id}', 'SellerCatController@delete_category');
      // user delete
      Route::post('user/delete', 'AdminController@delete_user');
      Route::get('user/active/{user_id}', 'AdminController@active_user');
      // add admin
      Route::post('admin/add_admin', 'AddAdminController@submit_admin');
      // payment receive
      Route::get('user/payment_confirm/{user_id}', 'PurchaseController@payment_receive');

   });

   Route::group(['middleware' => 'UserAuth'], function() {
      
      // seller user routes
      Route::get('user/dashboard', 'SellerProfileController@dashboard');
      
      // projects
      Route::post('user/add_project', 'ProjectController@submit_project');
      Route::post('user/update_project', 'ProjectController@update_project');
      Route::get('project/delete/{project_id}', 'ProjectController@delete_project');
      Route::get('project/active/{project_id}', 'ProjectController@active_project');
      Route::get('project/delete_forever/{project_id}', 'ProjectController@delete_forever');
      // purchase
      Route::get('seller/purchase', 'PurchaseController@prodect_purchase');

      Route::get('project/preview', 'ProjectController@preview');
      // orders
      Route::get('seller/accepted/{deal_id}', 'DealController@accepted_deal');
      Route::post('seller/reject', 'DealController@rejected_deal');

   });

   Route::group(['middleware' => 'BuyerAuth'], function() {
		// buyer routes
      Route::get('buyer/dashboard/{project_id?}', 'BuyerController@dashboard');

      // orders
      Route::post('buyer/add_deal', 'DealController@add_deal');
      Route::get('buyer/delete_deal/{deal_id}', 'DealController@delete_deal');

	});

	  
	// basic calls
	Route::get('check_email/{email}', 'BasicController@check_email');
   Route::get('project/vote/{project_id}', 'ProjectController@vote_project');
   Route::get('project/cancel_vote/{project_id}', 'ProjectController@cancel_vote_project');

});

