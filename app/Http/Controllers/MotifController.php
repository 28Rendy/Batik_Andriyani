<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motif;

class MotifController extends Controller
{
    public function index()
    {
        $motif = Motif::all();
        return view('kategori.Motif', compact('motif'));
    }

    public function create()
    {
        return view('kategori.Tmotif');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_motif' => 'required|string|max:255|unique:motif,kode_motif',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

        ]);
    

        $motif = new Motif();
        $motif->kode_motif = $request->kode_motif;
        $motif->nama = $request->nama;
        $motif->deskripsi = $request->deskripsi;

        $motif->save();

        return redirect()->route('motif.index')->with('success', 'Motif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $motif = Motif::findOrFail($id);
        return view('kategori.Emotif', compact('motif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_motif' => 'required|string|max:255|unique:motif,kode_motif,' . $id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

        ]);

        $motif = Motif::findOrFail($id);
        $motif->kode_motif = $request->kode_motif;
        $motif->nama = $request->nama;
        $motif->deskripsi = $request->deskripsi;

        $motif->save();

        return redirect()->route('motif.index')->with('success', 'Motif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $motif = Motif::findOrFail($id);
        $motif->delete();

        return redirect()->route('motif.index')->with('success', 'Motif berhasil dihapus.');
    }
}
