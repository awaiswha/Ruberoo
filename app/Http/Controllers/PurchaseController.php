<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\UserAlloweds;

class PurchaseController extends Controller
{
    public function prodect_purchase()
    {
    	$user = Auth::USer();
    	$u_allow = UserAlloweds::where('user_idFk', $user->user_id)->orderBy('allowed_id', 'desc')->firstOrFail();
    	$allow = new UserAlloweds();

    	$allow->number_of 	= $u_allow->number_of + 1;
    	$allow->user_idFk	= $user->user_id;
    	$allow->per_project	= $u_allow->per_project;
    	$allow->price		= $u_allow->per_project;

    	$allow->save();

    	return redirect('user/dashboard')->with('success', 'Limit Increased');
    }

    public function payment_receive($user_id)
    {
        $allow = UserAlloweds::where('user_idFk', $user_id)->update(['allow_status' => '1']);

        return redirect('admin/dashboard')->with('success', 'Payment Received');
    }

}
