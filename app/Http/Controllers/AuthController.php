<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mailers\Mailer;
use App\Projects;
use App\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    protected $mailer;
    function __construct(Mailer $mailer){
        
        $this->mailer = $mailer;

    }

    public function index()
    {
        $projects = Projects::with(array('user' => function($q){
                    $q->where('user_status', '1');
                    }))->where('project_status', '1')->get();

        
        return view('public.index', compact('projects'));
    }

    public function login_page($project_id = false)
    {
        if($project_id){
            session(['project_id' => $project_id]);
        }

    	return view('public.login');
    }

    public function admin_login_page()
    {
        return view('admin.login');
    }

    public function auth_login(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    		
            if(Auth::User()->user_role_idFk == 1 || Auth::User()->user_role_idFk == 2){
                return redirect('admin/dashboard');
            }

            if(Auth::User()->user_role_idFk == 3){

                if(Auth::User()->user_status == '1'){

                    return redirect('user/dashboard');

                }else{

                    Auth::logout();

                    return redirect('login')->with('error', 'You Account Is Disabled');

                }
            	
            }elseif(Auth::User()->user_role_idFk == 4){

                if(Auth::User()->user_status == '1'){
                    if(session('project_id')){
                        return redirect('buyer/dashboard/'.session('project_id'));
                    }else{
                       return redirect('buyer/dashboard'); 
                    }


                }else{

                    Auth::logout();

                    return redirect('login')->with('error', 'You Account Is Disabled');
                    
                }

            }

        }else{

            return redirect()->back()->withErrors('Invalid credentials please verify before login')->withInput();
        }
            
    }

    public function dashboard()
    {
    	$user = Auth::User();

    	return view('dashboard', compact('user'));
    }

    public function logut()
    {
    	Auth::logout();

        return redirect('login');
    }

    public function reset_password(Request $request)
    {
        $user = User::where('email', $request->email)->get();

        if(count($user) > 0){

            $password = str_random(8);
            $user = User::findOrFail($user[0]->user_id);
            $user->password = Hash::make($password);
            $user->save();

            $view = 'mail.mail';
            $subject = 'Password';  
            $data['reason'] = $password;
            
            // $this->mailer->sendTo($user->email, $subject, $view, $data);

            return redirect('login')->with('success', 'Password Send. Check Email!');
        }else{
            return redirect('login')->with('error', 'Email Not Register!');
        }

    }

}
