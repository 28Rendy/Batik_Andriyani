<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukuran;

class UkuranController extends Controller
{
    public function index()
    {
        $ukuran = Ukuran::all();
        return view('kategori.ukuran', compact('ukuran'));
    }

    public function create()
    {
        return view('kategori.Tukuran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
           
        ]);

        Ukuran::create($request->all());

        return redirect()->route('ukuran.index')->with('success', 'Data ukuran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ukuran = Ukuran::findOrFail($id);
        return view('kategori.Eukuran', compact('ukuran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

        ]);

        $ukuran = Ukuran::findOrFail($id);
        $ukuran->update($request->all());

        return redirect()->route('ukuran.index')->with('success', 'Data ukuran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ukuran = Ukuran::findOrFail($id);
        $ukuran->delete();

        return redirect()->route('ukuran.index')->with('success', 'Data ukuran berhasil dihapus.');
    }
}
