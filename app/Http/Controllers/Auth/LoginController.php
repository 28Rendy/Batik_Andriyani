<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Redirect user based on account type.
     */
    public function redirectTo()
    {
        $user = auth()->user();
        if ($user && ($user->tipe_akun === 'pelanggan' || strtolower($user->roles) === 'pelanggan')) {
            return '/pelanggan/dashboard';
        }
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}


// <!-- resources/views/auth/forgot.blade.php -->
// @extends('layouts.app')

// @section('content')
// <div class="container">
//     <h2>Lupa Password</h2>
//     <form action="{{ route('forgot.store') }}" method="POST">
//         @csrf
//         <div class="form-group">
//             <label for="email">Email:</label>
//             <input type="email" name="email" class="form-control" required>
//         </div>

//         <div class="form-group">
//             <label for="nama_ibu">Nama Ibu Kandung:</label>
//             <input type="text" name="nama_ibu" class="form-control" required>
//         </div>

//         <button type="submit" class="btn btn-primary">Verifikasi</button>
//     </form>
// </div>
// @endsection
