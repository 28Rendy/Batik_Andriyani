<?php

namespace App\Http\Middleware;

use Closure;

class IsStaff
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
        if (auth()->check() && (auth()->user()->roles === "STAFF" || auth()->user()->roles === "PEMILIK" || auth()->user()->roles === "ADMIN")) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
