<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Dashboard Portal Pelanggan
     */
    public function dashboard()
    {
        $user = Auth::user();
        $totalPesanan = Pesanan::where('user_id', $user->id)->count();
        $pesananDiproses = Pesanan::where('user_id', $user->id)->whereIn('status_pesanan', ['pending', 'diproses'])->count();
        $pesananSelesai = Pesanan::where('user_id', $user->id)->where('status_pesanan', 'selesai')->count();

        $pesananTerbaru = Pesanan::where('user_id', $user->id)->latest()->take(5)->get();

        return view('pelanggan.dashboard', compact('user', 'totalPesanan', 'pesananDiproses', 'pesananSelesai', 'pesananTerbaru'));
    }

    /**
     * Daftar Riwayat Pesanan
     */
    public function pesanan()
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)->latest()->paginate(10);

        return view('pelanggan.pesanan.index', compact('pesanan'));
    }

    /**
     * Detail Pesanan Pelanggan
     */
    public function detailPesanan($id)
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)->findOrFail($id);

        return view('pelanggan.pesanan.show', compact('pesanan'));
    }

    /**
     * Pengaturan Profil Pelanggan
     */
    public function profil()
    {
        $user = Auth::user();
        return view('pelanggan.profil', compact('user'));
    }

    /**
     * Update Profil Pelanggan
     */
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'nama' => $request->nama,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = 'user_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['foto'] = $imageName;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profil akun Anda berhasil diperbarui!');
    }

    /**
     * Tampilkan Halaman Register Pelanggan
     */
    public function showRegister()
    {
        return view('auth.register_pelanggan');
    }

    /**
     * Proses Register Pelanggan
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $username = explode('@', $request->email)[0] . '_' . rand(100, 999);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $username,
            'password' => Hash::make($request->password),
            'roles' => 'PELANGGAN',
            'tipe_akun' => 'pelanggan',
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'ACTIVE',
        ]);

        Auth::login($user);

        return redirect()->route('pelanggan.dashboard')->with('success', 'Pendaftaran akun pelanggan berhasil! Selamat datang di Batik Andriyani.');
    }
}

