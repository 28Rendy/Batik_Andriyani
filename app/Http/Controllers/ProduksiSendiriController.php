<?php

namespace App\Http\Controllers;

use App\Models\ProduksiSendiri;
use App\Models\Motif;
use App\Models\JenisKain;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProduksiSendiriController extends Controller
{
    public function index()
    {
        $produksi = ProduksiSendiri::with(['motif', 'JenisKain', 'ukuran'])->get();
        return view('barang.Psendiri', compact('produksi'));
    }

    public function create()
    {
        $motif = Motif::all();
        $JenisKain = JenisKain::all();
        $ukuran = Ukuran::all();

        return view('barang.Ptambah', compact('motif', 'JenisKain', 'ukuran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|string|max:255|unique:produksi_sendiri,kode_produk',
            'nama_produk' => 'required|string|max:255',
            'motif_id' => 'required|exists:motif,id',
            'jenis_kain_id' => 'required|exists:jenis_kain,id',
            'ukuran_id' => 'required|exists:ukuran,id',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);


        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $filename);
        }

        ProduksiSendiri::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'motif_id' => $request->motif_id,
            'jenis_kain_id' => $request->jenis_kain_id,
            'ukuran_id' => $request->ukuran_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'foto' => $filename ? 'photos/' . $filename : null,
        ]);

        return redirect()->route('Psendiri.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_produk' => 'required|string|max:255|unique:produksi_sendiri,kode_produk,' . $id,
            'nama_produk' => 'required|string|max:255',
            'motif_id' => 'required|exists:motif,id',
            'jenis_kain_id' => 'required|exists:jenis_kain,id',
            'ukuran_id' => 'required|exists:ukuran,id',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);

        $produk = ProduksiSendiri::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($produk->foto && file_exists(public_path($produk->foto))) {
                unlink(public_path($produk->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $filename);
            $produk->foto = 'photos/' . $filename;
        }

        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->motif_id = $request->motif_id;
        $produk->jenis_kain_id = $request->jenis_kain_id;
        $produk->ukuran_id = $request->ukuran_id;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;

        $produk->save();

        return redirect()->route('Psendiri.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function show($id)
    {
        $produksi = ProduksiSendiri::with(['motif', 'Jeniskain', 'ukuran'])->findOrFail($id);
        return view('barang.Ptambah', compact('produksi'));
    }

    public function edit($id)
    {
        $produksi = ProduksiSendiri::findOrFail($id);
        $motif = Motif::all();
        $JenisKain = JenisKain::all();
        $ukuran = Ukuran::all();

        return view('barang.Pedit', compact('produksi', 'motif', 'JenisKain', 'ukuran'));
    }

    public function destroy($id)
    {
        $data = ProduksiSendiri::findOrFail($id);

        if ($data->foto && Storage::exists('public/' . $data->foto)) {
            Storage::delete('public/' . $data->foto);
        }

        $data->delete();

        return redirect()->route('Psendiri.index')->with('success', 'Data berhasil dihapus');
    }
}
