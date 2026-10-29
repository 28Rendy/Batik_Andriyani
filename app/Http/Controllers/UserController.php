<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $user = User::all();
        return view('user.user', compact('user'));
    }


    // Menampilkan form tambah pengguna
    public function create()
    {
        // return view('user.create');
        return view('user.input');
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'username'  => 'required|string|unique:users,username',
            'kpassw'    => 'required|same:password',
            'roles'     => 'required',  // Menambah validasi untuk array roles
            'address'   => 'required',
            'phone'     => 'required',
            'status'    => 'required',
            'nama_ibu'  => 'required',
        ]);

        // Mengambil nilai roles yang dipilih
        $roles = $request->roles;

        // Tentukan pemilik berdasarkan roles
        $pemilik = in_array('PEMILIK', $roles) ? 'PEMILIK' : 'STAFF';  // Menyediakan nilai default jika tidak ada 'PEMILIK'

        // Simpan data pengguna
        // User::create([
        //     'nama'      => $request->nama,
        //     'email'     => $request->email,
        //     'username'  => $request->username,
        //     'password'  => Hash::make($request->kpassw),  // Pastikan menggunakan kpassw untuk password
        //     'roles'     => implode(',', $roles),  // Simpan roles sebagai string
        //     'pemilik'   => $pemilik,  // Berikan nilai default 'STAFF' jika tidak ada 'PEMILIK'
        //     'address'   => $request->address,
        //     'phone'     => $request->phone,
        //     'status'    => $request->status,
        //     'nama_ibu'  => $request->nama_ibu,
        User::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => Hash::make($request->kpassw),
            'roles'     => implode(',', $roles),
            'pemilik'   => $pemilik,  // Pastikan pemilik terisi dengan benar
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => $request->status,
            'nama_ibu'  => $request->nama_ibu,
        ]);

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil disimpan.');
    }



    // 'pemilik'   => $request->roles === 'PEMILIK' ? 1 : 0,
    // Menampilkan form edit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // Memperbarui data pengguna
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'nama'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email,' . $id,
        'username'  => 'required|string|unique:users,username,' . $id,
        'roles'     => 'required',
        'address'   => 'required',
        'phone'     => 'required',
        'status'    => 'required',
        'nama_ibu'  => 'required',
    ]);

    // Tentukan pemilik berdasarkan roles
    $roles = $request->roles;
    $pemilik = in_array('PEMILIK', $roles) ? 'PEMILIK' : 'STAFF'; // Tentukan pemilik berdasarkan roles

    // Perbarui data pengguna
    $user->update([
        'nama'      => $request->nama,
        'email'     => $request->email,
        'username'  => $request->username,
        'roles'     => implode(',', (array) $request->roles),
        'pemilik'   => $pemilik, // Pastikan pemilik diupdate dengan benar
        'address'   => $request->address,
        'phone'     => $request->phone,
        'status'    => $request->status,
        'nama_ibu'  => $request->nama_ibu,
    ]);

    // Jika password diubah, update password pengguna
    if ($request->has('ubahpass') && $request->password) {
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui.');
}


    // Menghapus data pengguna
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
