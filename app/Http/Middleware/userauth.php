<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class userauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $userid=\Auth::id();
        $user=user::find($userid);
        if($user->role!=$role){
            return redirect()->route('404');   
            
        }

        return $next($request);
    }
}
