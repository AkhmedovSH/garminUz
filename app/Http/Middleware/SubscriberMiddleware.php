<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class SubscriberMiddleware
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
       
        // If the user is not logged in, respond with a 403 error.
            if ( ! Auth::check()) {
                abort(404);
            }
        
         // If the user is not subscribed, show a different payments page.
            if(!Auth::user()->isSubscriber())
            {
                $user = User::find(Auth::user()->id);
                return response()->view('pages.profile_payment',compact('user'));
            }

            // The user is subscribed; continue with the request.
            return $next($request);

    }
}
