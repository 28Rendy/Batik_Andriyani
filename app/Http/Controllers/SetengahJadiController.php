<?php

namespace App\Http\Controllers;


use App\Models\SetengahJadi;

use App\Models\Motif;
use App\Models\JenisKain;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Validator;



class SetengahJadiController extends Controller
{
    public function index()
    {
        // Mengambil semua data SetengahJadi dengan relasi yang diperlukan
        $setengah = SetengahJadi::with(['motif', 'JenisKain', 'ukuran'])->get();
        return view('barang.Sjadi', compact('setengah')); // Pass setengah to the view
    }

    // public function create()
    // {
    //     $motif = Motif::all(); // Mengambil semua data motif
    //     $JenisKain = JenisKain::all(); // Mengambil semua data jenis kain
    //     $ukuran = Ukuran::all(); // Mengambil semua data ukuran

    //     return view('barang.Ptambah', compact('motif', 'JenisKain', 'ukuran')); // For the create form
    // }
    public function create()
    {
        $motif = Motif::all();
        $JenisKain = JenisKain::all();
        $ukuran = Ukuran::all();

        // Tambahkan ini untuk debug:
        ([
            'motif' => $motif,
            'JenisKain' => $JenisKain,
            'ukuran' => $ukuran,
        ]);

        return view('barang.Stambah', compact('motif', 'JenisKain', 'ukuran'));
    }

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_produk' => 'required|string|max:255|unique:setengah_jadi,kode_produk',
        'nama_produk' => 'required|string|max:255',
        'motif_id' => 'required|exists:motif,id',
        'jenis_kain_id' => 'required|exists:jenis_kain,id',
        'ukuran_id' => 'required|exists:ukuran,id',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
        'foto' => 'nullable|image|max:2048',
    ]);

    // HAPUS dd($request->all()); - ini yang menyebabkan kode berhenti

    $filename = null;
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('photos'), $filename);
    }

    // Simpan data ke database
    SetengahJadi::create([
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'motif_id' => $request->motif_id,
        'jenis_kain_id' => $request->jenis_kain_id,
        'ukuran_id' => $request->ukuran_id,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'foto' => $filename ? 'photos/' . $filename : null,
        // HAPUS duplikasi line foto
    ]);

    return redirect()->route('Sjadi.index')->with('success', 'Produk berhasil ditambahkan.');
}


    public function update(Request $request, $id)
    {
        // Validasi input - SEKARANG TERMASUK kode_produk
        $request->validate([
            'kode_produk' => 'required|string|max:255|unique:setengah_jadi,kode_produk,' . $id,
            'nama_produk' => 'required|string|max:255',
            'motif_id' => 'required|exists:motif,id',
            'jenis_kain_id' => 'required|exists:jenis_kain,id',
            'ukuran_id' => 'required|exists:ukuran,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Cari data berdasarkan ID
        $setengah = SetengahJadi::findOrFail($id);

        // Jika ada file foto baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($setengah->foto && file_exists(public_path($setengah->foto))) {
                unlink(public_path($setengah->foto));
            }

            // Upload foto baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $filename);
            $setengah->foto = 'photos/' . $filename;
        }

        // Update data lainnya - SEKARANG TERMASUK kode_produk
        $setengah->kode_produk = $request->kode_produk;
        $setengah->nama_produk = $request->nama_produk;
        $setengah->motif_id = $request->motif_id;
        $setengah->jenis_kain_id = $request->jenis_kain_id;
        $setengah->ukuran_id = $request->ukuran_id;
        $setengah->stok = $request->stok;
        $setengah->harga = $request->harga;

        $setengah->save();

        return redirect()->route('Sjadi.index')->with('success', 'Produk berhasil diperbarui.');
    }
    public function show($id)
    {
        // Menampilkan detail produk
        $setengah = SetengahJadi::with(['motif', 'Jeniskain', 'ukuran'])->findOrFail($id);
        return view('barang.Stambah', compact('setengah'));
    }

    public function edit($id)
    {
        $setengah = SetengahJadi::findOrFail($id);
        $motif = Motif::all();
        $JenisKain = JenisKain::all();
        $ukuran = Ukuran::all();

        return view('barang.Sedit', compact('setengah', 'motif', 'JenisKain', 'ukuran'));
    }


    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $data = SetengahJadi::findOrFail($id);

        // Jika ada file foto, hapus dari penyimpanan
        if ($data->foto && Storage::exists('public/' . $data->foto)) {
            Storage::delete('public/' . $data->foto);
        }

        // Hapus data dari database
        $data->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('Sjadi.index')->with('success', 'Data berhasil dihapus');
    }
}
