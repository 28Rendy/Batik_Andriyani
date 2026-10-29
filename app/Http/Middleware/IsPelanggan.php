<?php

namespace App\Http\Middleware;

use Closure;

class IsPelanggan
{
    /**
     * Handle an incoming request for Pelanggan portal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->tipe_akun === 'pelanggan' || strtolower($user->roles) === 'pelanggan') {
                return $next($request);
            }
        }
        return redirect()->route('login')->with('error', 'Akses khusus pelanggan.');
    }
}

