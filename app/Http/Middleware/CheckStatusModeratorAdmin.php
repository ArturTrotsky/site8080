<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckStatusModeratorAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ((Auth::user() && Auth::user()->isAdministrator()) || (Auth::user() && Auth::user()->isModerator())) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
