<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\ProduksiSendiri;

class PProduksiSendiriController extends Controller
{
    // Menampilkan semua data penjualan dari produksi sendiri
    public function index()
    {
        $penjualan = Penjualan::where('sumber_produk', 'produksi_sendiri')->get();
        return view('penjualan.PPSendiri', compact('penjualan'));
    }

    // Menampilkan form tambah data penjualan produksi sendiri
    public function create()
    {
        $produk = ProduksiSendiri::all();
        return view('penjualan.TPPSendiri', compact('produk'));
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'required|string',
            // 'keterangan' => 'required|string',
            'nama_produk' => 'required|integer|exists:produksi_sendiri,id',
            'jumlah_item' => 'required|integer|min:1',
            'status_pembayaran' => 'required|in:lunas,belum_lunas',
        ]);
    
        $produk = ProduksiSendiri::findOrFail($request->nama_produk);
    
        // Cek apakah stok mencukupi
        if ($produk->stok < $request->jumlah_item) {
            return back()->withErrors(['jumlah_item' => 'Stok tidak mencukupi.'])->withInput();
        }
    
        $penjualan = Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kode_produk' => $produk->kode_produk,
            'nama_produk' => $produk->nama_produk,
            // // 'keterangan' => $request->keterangan,
            'jumlah_item' => $request->jumlah_item,
            'harga_satuan' => $produk->harga,
            'total_bayar' => $produk->harga * $request->jumlah_item,
            'status_pembayaran' => $request->status_pembayaran,
            'sumber_produk' => 'produksi_sendiri',
        ]);
    
        // Kurangi stok
        $produk->stok -= $request->jumlah_item;
        $produk->save();
    
        return redirect()->route('ppsendiri.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }
    
    // Menampilkan form edit penjualan produksi sendiri
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $produk = ProduksiSendiri::all();
        return view('penjualan.EPPSendiri', compact('penjualan', 'produk'));
    }

    // Menyimpan perubahan data penjualan
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'required|string',
            // 'keterangan' => 'required|string',
            'nama_produk' => 'required|integer|exists:produksi_sendiri,id',
            'jumlah_item' => 'required|integer|min:1',
            'status_pembayaran' => 'required|in:lunas,belum_lunas',
        ]);
    
        // Ambil data penjualan lama
        
        // Simpan produk lama dan kembalikan stok-nya
        // $produkLama = ProduksiSendiri::find($penjualan->produk_id);
        // if ($produkLama) {
            //     $produkLama->stok += $penjualan->jumlah_item;
            //     $produkLama->save();
            // }
            
            
            // Ambil produk baru dari request
        $penjualan = Penjualan::findOrFail($id);
        $produkBaru = ProduksiSendiri::findOrFail($request->nama_produk);
            
        $stokLama = $penjualan->jumlah_item;
        // Cek stok produk baru apakah cukup
        if ($produkBaru->stok < $request->jumlah_item) {
            return back()->withErrors(['jumlah_item' => 'Stok tidak mencukupi untuk pembaruan.'])->withInput();
        }
    
        // Update data penjualan
        $penjualan->update([
            'produk_id' => $produkBaru->id,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'nama_produk' => $produkBaru->nama_produk,
            // // 'keterangan' => $request->keterangan,
            'jumlah_item' => $request->jumlah_item,
            'harga_satuan' => $produkBaru->harga,
            'total_harga' => $produkBaru->harga * $request->jumlah_item,
            'total_bayar' => $produkBaru->harga * $request->jumlah_item,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        $produkBaru->stok += $stokLama;
    
        // Kurangi stok produk baru
        $produkBaru->stok -= $request->jumlah_item;
        $produkBaru->save();
    
        return redirect()->route('ppsendiri.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }
    

    // Menghapus data penjualan dan mengembalikan stok
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        // Kembalikan stok ke produk
        $produk = ProduksiSendiri::find($penjualan->produk_id);
        if ($produk) {
            $produk->stok += $penjualan->jumlah_item;
            $produk->save();
        }

        $penjualan->delete();

        return redirect()->route('ppsendiri.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
