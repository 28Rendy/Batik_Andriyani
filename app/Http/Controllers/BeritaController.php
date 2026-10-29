<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $news = Berita::latest()->paginate(10);
        return view('berita.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();

        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            $data['image'] = $imageName;
        }


        // Set published_at if status is published
        if ($request->status == 'published') {
            $data['published_at'] = now();
        }

        Berita::create($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $news)
    {
        return view('berita.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $news)
    {
        return view('berita.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::disk('public')->delete('news/' . $news->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('news', $imageName, 'public');
            $data['image'] = $imageName;
        }

        // Set published_at if status changed to published
        if ($request->status == 'published' && $news->status != 'published') {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete('photos/' . $news->image);
        }

        $news->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function frontend()
    {
        $news = Berita::latest()->paginate(10);
        return view('berita.berita-frontend', compact('news'));
    }
}
