<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class BuyerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            if(Auth::user()->user_role_idFk == 4){

                return $next($request);

            }else{

                return redirect()->back();

            }

        }else{
            return redirect('/');
        }
    }
}
