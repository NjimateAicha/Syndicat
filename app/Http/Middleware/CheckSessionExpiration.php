<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Carbon\Carbon;

class CheckSessionExpiration
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
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get login time from session
            $loginTime = session('login_time');
            
            // If login_time exists in the session
            if ($loginTime) {
                $loginTime = Carbon::parse($loginTime);
                $currentTime = Carbon::now();

                // Get session lifetime in minutes from config
                $sessionLifetime = config('session.lifetime');

                // If session has exceeded its lifetime
                if ($currentTime->diffInMinutes($loginTime) >= $sessionLifetime) {
                    // Call the destroy method from AuthenticatedSessionController
                    $controller = new AuthenticatedSessionController();
                    return $controller->destroy($request);
                }
            }
        }

        return $next($request);
    }
}
