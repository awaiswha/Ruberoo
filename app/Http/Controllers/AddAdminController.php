<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UserProfile;
use Auth;
use Hash;

class AddAdminController extends Controller
{
    public function submit_admin(Request $request)
    {
    	$user = new User();

    	$user->user_name		= $request->user_name;
    	$user->user_role_idFk	= 2;
    	$user->email 			= $request->email;
    	$user->password 		= Hash::make($request->password);

    	$user->save();

    	$u_profile = new UserProfile();

    	$u_profile->user_idFk	= $user->user_id;
    	$u_profile->first_name	= $request->first_name;
    	$u_profile->last_name	= $request->last_name;

    	$u_profile->save();

    	return redirect('admin/dashboard')->with('success', 'Admin Successfuly Added');


    }
}
