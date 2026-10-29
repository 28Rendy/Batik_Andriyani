<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('urutan', 'asc')->latest()->paginate(12);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->except(['gambar']);
        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $request->input('urutan', 0) ?? 0;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = 'galeri_' . time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['gambar'] = 'photos/' . $imageName;
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->except(['gambar']);
        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $request->input('urutan', 0) ?? 0;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = 'galeri_' . time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['gambar'] = 'photos/' . $imageName;
        }

        $item->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}

