<?php
namespace App\Http\Controllers;

use App\Models\JenisKain;
use Illuminate\Http\Request;

class JenisKainController extends Controller
{
    public function index()
    {
        $jenis_kain = JenisKain::all();
        return view('kategori.Jkain', compact('jenis_kain'));
    }

    public function create()
    {
        return view('kategori.Tkain');
    }

    public function store(Request $request)
    {
        JenisKain::create($request->all());
        return redirect()->route('Jkain.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenis_kain = JenisKain::findOrFail($id);
        return view('kategori.Ekain', compact('jenis_kain'));
    }

    public function update(Request $request, $id)
    {
        JenisKain::findOrFail($id)->update($request->all());
        return redirect()->route('Jkain.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JenisKain::destroy($id);
        return redirect()->route('Jkain.index')->with('success', 'Data berhasil dihapus');
    }
}