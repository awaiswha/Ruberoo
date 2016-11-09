<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categories;
use App\UserAlloweds;
use Illuminate\Support\Facades\Mail;
use App\Mailers\Mailer;
use App\Deals;
use App\User;
use App\Projects;
use App\ProjectVotes;
use Auth;
use DB;

class AdminController extends Controller
{
    protected $mailer;
    function __construct(Mailer $mailer){
        
        $this->mailer = $mailer;

    }

    public function dashboard()
    {
    	$user = Auth::User();
    	$categories = Categories::where('user_idFk', $user->user_id)->where('cat_status', '1')->get();
        $history    = UserAlloweds::all();
        $deals     = Deals::all();
        
    	if($user->user_role_idFk == 1){
            $users      = User::whereIn('user_role_idFk', [2, 3, 4])->get();
        }else{
            $users      = User::whereIn('user_role_idFk', [3, 4])->get();
        }

        $most_likes     = ProjectVotes::with('project')->select('project_idFk', DB::raw('COUNT(project_idFk) as count'))
                                            ->groupBy('project_idFk')
                                            ->orderBy('count', 'desc')->get();

        $user_likes = ProjectVotes::with('user')->select('project_owner', DB::raw('COUNT(project_owner) as count'))->groupBy('project_owner')
                                            ->orderBy('count', 'desc')->get();
        
       
    	return view('admin.admin_dashboard', compact('user', 'categories', 'users', 'history', 'deals', 'most_likes', 'user_likes'));
    }

    public function delete_user(Request $request)
    {

    	$user = User::findOrFail($request->user_id);

    	$user->user_status = '0';

    	$user->save();

        $view = 'mail.mail';
        $subject = 'Disabled';  
        $data['reason'] = $request->reason;
        
        $this->mailer->sendTo($user->email, $subject, $view, $data);

    	return redirect('admin/dashboard')->with('success', 'User Successfuly Disabled');

    }

    public function active_user($user_id)
    {
    	$user = User::findOrFail($user_id);

    	$user->user_status = '1';

    	$user->save();

    	return redirect('admin/dashboard')->with('success', 'User Successfuly Active');

    }

}
