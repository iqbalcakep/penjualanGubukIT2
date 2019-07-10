<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckLoginAdmin
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
        if (Session::has("level")) {
            if(Session::get("level")=="user"){
                return redirect('/user');
            }
        }else{
            return redirect('/');
        }
        return $next($request);
    }
}
