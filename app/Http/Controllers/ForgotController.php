<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotController extends Controller
{
    public function create()
    {
        return view('auth.forgot'); // Halaman form untuk input email dan nama ibu
    }

    // Memproses jawaban pertanyaan keamanan
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nama_ibu' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan email dan nama ibu
        $user = User::where('email', $request->email)
            ->where('nama_ibu', $request->nama_ibu)
            ->first();

        if ($user) {
            // Jika data cocok, simpan email untuk proses reset password selanjutnya
            session(['reset_email' => $user->email]);

            // Redirect ke form untuk mengganti password
            return redirect()->route('forgot.create');
        }

        // Jika data tidak cocok, tampilkan pesan error
        return back()->withErrors(['message' => 'Data tidak cocok.']);
    }

    // Menampilkan form untuk reset password
    public function edit()
    {
        if (!session('reset_email')) {
            return redirect()->route('forgot.create'); // Kembali ke halaman form jika session tidak ditemukan
        }

        return view('auth.forgot'); // Halaman form untuk reset password
    }

    // Memproses dan menyimpan password baru
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', session('reset_email'))->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            session()->forget('reset_email');

            return redirect()->route('login')->with('success', 'Password berhasil diubah.');
        }

        return redirect()->route('forgot.create')->withErrors(['message' => 'Terjadi kesalahan.']);
    }
}
