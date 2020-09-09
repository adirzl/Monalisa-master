<?php

namespace App\Http\Middleware;

use Closure;

class ForceChangePassword
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
        if(auth()->user()->force_change_password){
            return redirect(route('auth.change'));
        }

        return $next($request);
    }
}
