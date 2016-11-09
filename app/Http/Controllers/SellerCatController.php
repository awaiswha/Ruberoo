<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categories;
use Auth;

class SellerCatController extends Controller
{
    public function submit_category(Request $reqeust)
    {
    	$cat = new Categories();

    	$cat->user_idFk	= Auth::User()->user_id;
    	$cat->cat_name 	= $reqeust->cat_name;

    	$cat->save();

    	return redirect('admin/dashboard')->with('success', 'Category Successfuly Added');

    }

    public function update_category(Request $reqeust)
    {
    	$cat = Categories::findOrFail($reqeust->cat_id);

    	$cat->cat_name 	= $reqeust->cat_name;

    	$cat->save();

    	return redirect('admin/dashboard')->with('success', 'Category Successfuly Updated');

    }

    public function delete_category($cat_id)
    {
    	$cat = Categories::findOrFail($cat_id);

    	$cat->cat_status = '0';

    	$cat->save();

    	return redirect('admin/dashboard')->with('success', 'Category Successfuly Deleted');
    }

}
