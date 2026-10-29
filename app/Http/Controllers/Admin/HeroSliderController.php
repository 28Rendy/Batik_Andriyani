<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('urutan', 'asc')->get();
        return view('admin.hero-slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.hero-slider.create');
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
            $imageName = 'slider_' . time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['gambar'] = 'photos/' . $imageName;
        }

        HeroSlider::create($data);

        return redirect()->route('admin.hero-slider.index')->with('success', 'Banner slider berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('admin.hero-slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

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
            $imageName = 'slider_' . time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['gambar'] = 'photos/' . $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.hero-slider.index')->with('success', 'Banner slider berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);
        $slider->delete();

        return redirect()->route('admin.hero-slider.index')->with('success', 'Banner slider berhasil dihapus!');
    }
}
