<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();
        // dd($user->getRoleNames()->toArray());
        if (in_array('admin', $user->getRoleNames()->toArray())  ) {
            return $next($request);
        } else
        // abort(403, 'Wrong Accept Header');
        {
            return new Response(view('notauthorized')->with('role', 'admin'));
        }

    }
}
