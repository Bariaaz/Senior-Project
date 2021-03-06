<?php

namespace LU\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Student
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
        if(!Auth::check()){
            return redirect('/login');
        }

        if (Auth::user()->isStudent()) {
            return $next($request);
        } else if(Auth::user()->isAdmin()) {
            return redirect('admin');
        } else if (Auth::user()->isInstructor()) {
            return redirect('instructor/groups');
        } else {
            return redirect('/logout');    
        }
    }
}
