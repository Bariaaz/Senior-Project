<?php

namespace LU\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Instructor
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
            if(Auth::user()->isInstructor()){
                return $next($request);
            }
            else{
                if(Auth::user()->isAdmin())
                    return redirect('admin');
                else{
                    if(Auth::user()->isStudent())
                        return redirect('student');
                    else
                        return redirect('/logout');    
                }     
            }
        }
        return redirect('/login');
    }
}
