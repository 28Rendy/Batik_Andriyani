<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (auth()->check() && in_array(auth()->user()->roles, ['PEMILIK', 'ADMIN'])) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
