<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('urutan', 'asc')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $request->input('urutan', 0) ?? 0;

        Faq::create($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $request->input('urutan', 0) ?? 0;

        $faq->update($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus!');
    }
}
