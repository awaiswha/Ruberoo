<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\ProjectVotes;
use App\Deals;
use Auth;

class BuyerController extends Controller
{
    public function dashboard($project_id = false)
    {
    	$front_card = false;
    	if($project_id){
    		$front_card  = true;
    		$add_card = Projects::findOrFail($project_id);

    	}
    	
    	$user = Auth::User();
    	$votes              = ProjectVotes::where('vote_status', '1')->get();
    	$u_votes            = ProjectVotes::where('user_idFk', $user->user_id)->where('vote_status', '1')->get();
    	$deals 				= Deals::where('buyer_idFk', $user->user_id)->get();
    	
    	if(session('project_id')){
    		session()->flush();
    	}
    	return view('buyer.buyer_dashboard', compact('user', 'projects', 'votes', 'u_votes', 'deals', 'front_card', 'add_card'));
    }
}
