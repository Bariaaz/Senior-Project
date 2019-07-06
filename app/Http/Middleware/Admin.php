<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
            else{
                if(Auth::user()->isStudent())
                    return redirect('student');
                else{
                    if(Auth::user()->isInstructor())
                        return redirect('instructor/groups');
                    else
                        return redirect('/logout');    
                }     
            }
        }
        return redirect('/login');
        
    }
}
