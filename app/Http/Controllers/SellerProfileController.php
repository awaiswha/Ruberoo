<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categories;
use App\SizeCategories;
use App\Projects;
use App\ProjectVotes;
use App\UserAlloweds;
use App\Deals;
use Auth;

class SellerProfileController extends Controller
{
    public function dashboard()
    {
    	$user = Auth::User();
    	$categories         = Categories::where('cat_status', '1')->get();
        $sizes              = SizeCategories::all();
        $projects           = Projects::where('user_idFk', $user->user_id)->get();
        $votes              = ProjectVotes::where('user_idFk', $user->user_id)->where('vote_status', '1')->get();
        $active_projects    = Projects::where('user_idFk', $user->user_id)->where('project_status', '1')->count();
        $u_votes            = ProjectVotes::where('user_idFk', $user->user_id)->where('vote_status', '1')->get();
        $allow              = UserAlloweds::where('user_idFk', $user->user_id)->orderBy('allowed_id', 'desc')->firstOrFail();
        $deals              = Deals::where('seller_idFk', $user->user_id)->get();
        
    	return view('seller.seller_dashboard', compact('user', 'categories', 'sizes', 'projects', 'votes', 'active_projects', 'u_votes', 'allow', 'deals'));
    }

    public function update_profile(Request $request)
    {
    	dd($request);
    }

}
