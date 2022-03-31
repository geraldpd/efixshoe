<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check())
        {
            return redirect()->route('admin.login');
        }

        $role_id = Auth::user()->roles->first()->id;

        if ($role_id !== 1)
        {
            return redirect()->route('/');
        }

        return $next($request);
    }
}
