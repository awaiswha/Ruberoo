<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use File;
use App\User;
use App\UserProfile;
use App\Projects;
use Image;
use Hash;

class UserProfileController extends Controller
{
	public function update_profile(Request $request)
	{
		
		$user = User::findOrFail(Auth::User()->user_id);

		$user->user_name = $request->user_name;

		$user->save();

		$user_profile = UserProfile::findOrFail($user->profile->profile_id);

		$user_profile->last_name 	= $request->last_name;
		$user_profile->address 		= $request->address;
		$user_profile->dob 			= $request->dob;
		$user_profile->phone_no 	= $request->phone_no;

        if($request->hasFile('profile_image')){

            if($user_profile->profile_image){
                File::delete('assets/upload/images/'.$user_profile->profile_image);
            }

            $filename = $request->dob.'_'.str_random(40);
            
            $request->file('profile_image')->move('assets/upload/images/', $filename);
            $user_profile->profile_image = $filename;

            Image::make('assets/upload/images/'.$user_profile->profile_image)->resize(200, 200)->save();

        }


        $user_profile->save();

        if(Auth::User()->user_role_idFk == 1 || Auth::User()->user_role_idFk == 2){
            return redirect('admin/dashboard')->with('success', 'Profile Successfuly Updated');
        }

        if(Auth::User()->user_role_idFk == 3){
        	return redirect('user/dashboard')->with('success', 'Profile Successfuly Updated');
        }elseif(Auth::User()->user_role_idFk == 4){
            return redirect('buyer/dashboard')->with('success', 'Profile Successfuly Updated');
        }
	}

    public function check_password($password)
    {
        $email = Auth::User()->email;

        if (Auth::attempt(['email' => $email, 'password' => $password])){
                     
            return 'true';

        }else{

            return 'false';

        }
    }

    public function change_password(Request $request)
    {

        $user = User::findOrFail(Auth::User()->user_id);

        $user->password = Hash::make($request->new_password);

        $user->save();

        if(Auth::User()->user_role_idFk == 1 || Auth::User()->user_role_idFk == 2){
            return redirect('admin/dashboard')->with('success', 'Password Successfuly Updated');
        }

        if(Auth::User()->user_role_idFk == 3){
            return redirect('user/dashboard')->with('success', 'Password Successfuly Updated');
        }elseif(Auth::User()->user_role_idFk == 4){
            return redirect('buyer/dashboard')->with('success', 'Password Successfuly Updated');
        }

    }

    public function user_profile($user_id)
    {

        $profile = User::where('user_id', $user_id)->where('user_role_idFk', '3')->get();
        $user = Auth::User();

        if(count($profile) > 0){
            $projects = Projects::where('user_idFk', $profile[0]->user_id)->where('project_status', '1')->orderBy('project_id', 'desc')->get();
        }else{
            return redirect()->back();
        }

        return view('user_profile', compact('user', 'projects', 'profile'));
        
    }

    public function banner_upload(Request $request)
    {
        $user       = Auth::User();
        $pro        = UserProfile::findOrFail($user->profile->profile_id);

        if($request->hasFile('profile_banner')){

            if($pro->profile_banner){
                File::delete('assets/upload/images/'.$pro->profile_banner);
            }

            $file_banner = $request->dob.'_'.str_random(40);
            
            $request->file('profile_banner')->move('assets/upload/images/', $file_banner);
            $pro->profile_banner = $file_banner;

            $pro->save();

        }

        return redirect('user/dashboard')->with('success', 'Banner Successfuly Updated');
    }

}
