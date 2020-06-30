<?php

namespace App\Http\Middleware;

use Closure;

class Owner
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
        //Owner = kabkhalid19@gmail.com
        $user = auth()->user();
        if (strtolower($user->email) == 'kabkhalid19@gmail.com') {
            return $next($request);
        }
        return abort(404); 
        
    }
}
