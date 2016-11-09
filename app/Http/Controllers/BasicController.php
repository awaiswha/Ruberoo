<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class BasicController extends Controller
{
    public function check_email($email)
    {
    	$user = User::where('email', $email)->exists();

    	if($user == true){
    		return '1';
    	}else{
    		return '0';
    	}
    }
}
