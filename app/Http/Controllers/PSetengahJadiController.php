<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\SetengahJadi;
use Illuminate\Support\Facades\Log;

class PSetengahJadiController extends Controller
{
    // Menampilkan semua data penjualan setengah jadi
    public function index()
    {
        $penjualan = Penjualan::where('sumber_produk', 'setengah_jadi')->get();
        return view('penjualan.PSetengah', compact('penjualan'));
    }

    // Menampilkan form tambah data penjualan setengah jadi
    public function create()
    {
        $produk = SetengahJadi::all();
        return view('penjualan.TPSetengah', compact('produk'));
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'keterangan' => 'nullable|string',
            'nama_produk' => 'required|integer|exists:setengah_jadi,id',
            'jumlah_item' => 'required|integer|min:1',
            'status_pembayaran' => 'required|in:lunas,belum_lunas',
        ]);

        $produk = SetengahJadi::findOrFail($request->nama_produk);

        // Cek apakah stok mencukupi
        if ($produk->stok < $request->jumlah_item) {
            return back()->withErrors(['jumlah_item' => 'Stok tidak mencukupi.'])->withInput();
        }

        Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'produk_id' => $produk->id,
            'kode_produk' => $produk->kode_produk,
            'nama_produk' => $produk->nama_produk,
            'keterangan' => $request->keterangan,
            'jumlah_item' => $request->jumlah_item,
            'harga_satuan' => $produk->harga,
            'total_bayar' => $produk->harga * $request->jumlah_item,
            'status_pembayaran' => $request->status_pembayaran,
            'sumber_produk' => 'setengah_jadi',
        ]);

        // Kurangi stok
        $produk->stok -= $request->jumlah_item;
        $produk->save();

        return redirect()->route('psetengah.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    // Menampilkan form edit penjualan
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $produk = SetengahJadi::all();
        return view('penjualan.EPSetengah', compact('penjualan', 'produk'));
    }

    // Menyimpan perubahan data penjualan - WITH DEBUG
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'keterangan' => 'nullable|string',
            'nama_produk' => 'required|integer|exists:setengah_jadi,id',
            'jumlah_item' => 'required|integer|min:1',
            'status_pembayaran' => 'required|in:lunas,belum_lunas',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $produkBaru = SetengahJadi::findOrFail($request->nama_produk);

        // Simpan data lama untuk perhitungan stok
        $produkIdLama = $penjualan->produk_id;
        $jumlahItemLama = $penjualan->jumlah_item;
        $jumlahItemBaru = $request->jumlah_item;

        // Debug: Log data sebelum update
        Log::info('Update Penjualan Debug:', [
            'penjualan_id' => $id,
            'produk_id_lama' => $produkIdLama,
            'produk_id_baru' => $produkBaru->id,
            'jumlah_lama' => $jumlahItemLama,
            'jumlah_baru' => $jumlahItemBaru,
            'stok_sebelum' => $produkBaru->stok
        ]);

        // LOGIKA: Bedakan apakah produk berubah atau tidak
        if ($produkIdLama == $produkBaru->id) {
            // KASUS 1: Produk sama, hanya jumlah yang berubah
            $selisihJumlah = $jumlahItemBaru - $jumlahItemLama;
            
            Log::info('Produk sama - Selisih jumlah: ' . $selisihJumlah);
            
            // Cek apakah stok mencukupi untuk penambahan
            if ($selisihJumlah > 0 && $produkBaru->stok < $selisihJumlah) {
                return back()->withErrors(['jumlah_item' => 'Stok tidak mencukupi. Stok tersedia: ' . $produkBaru->stok])->withInput();
            }
            
            // Update stok berdasarkan selisih
            $stokSebelum = $produkBaru->stok;
            $produkBaru->stok -= $selisihJumlah;
            $produkBaru->save();
            
            Log::info('Stok updated:', [
                'stok_sebelum' => $stokSebelum,
                'selisih' => $selisihJumlah,
                'stok_sesudah' => $produkBaru->stok
            ]);
            
        } else {
            // KASUS 2: Produk berbeda
            Log::info('Produk berbeda - memproses pengembalian dan pengurangan stok');
            
            // STEP 1: Kembalikan stok produk lama
            $produkLama = SetengahJadi::find($produkIdLama);
            if ($produkLama) {
                $stokLamaSebelum = $produkLama->stok;
                $produkLama->stok += $jumlahItemLama;
                $produkLama->save();
                
                Log::info('Stok produk lama dikembalikan:', [
                    'produk_id' => $produkIdLama,
                    'stok_sebelum' => $stokLamaSebelum,
                    'jumlah_dikembalikan' => $jumlahItemLama,
                    'stok_sesudah' => $produkLama->stok
                ]);
            }

            // STEP 2: Cek apakah stok produk baru mencukupi
            $produkBaru->refresh();
            
            if ($produkBaru->stok < $jumlahItemBaru) {
                // Kembalikan stok produk lama seperti semula jika tidak mencukupi
                if ($produkLama) {
                    $produkLama->stok -= $jumlahItemLama;
                    $produkLama->save();
                }
                return back()->withErrors(['jumlah_item' => 'Stok tidak mencukupi. Stok tersedia: ' . $produkBaru->stok])->withInput();
            }

            // STEP 3: Kurangi stok produk baru
            $stokBaruSebelum = $produkBaru->stok;
            $produkBaru->stok -= $jumlahItemBaru;
            $produkBaru->save();
            
            Log::info('Stok produk baru dikurangi:', [
                'produk_id' => $produkBaru->id,
                'stok_sebelum' => $stokBaruSebelum,
                'jumlah_dikurangi' => $jumlahItemBaru,
                'stok_sesudah' => $produkBaru->stok
            ]);
        }

        // STEP 4: Update data penjualan
        $updated = $penjualan->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'produk_id' => $produkBaru->id,
            'kode_produk' => $produkBaru->kode_produk,
            'nama_produk' => $produkBaru->nama_produk,
            'keterangan' => $request->keterangan,
            'jumlah_item' => $jumlahItemBaru,
            'harga_satuan' => $produkBaru->harga,
            'total_bayar' => $produkBaru->harga * $jumlahItemBaru,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        Log::info('Penjualan updated: ' . ($updated ? 'Success' : 'Failed'));

        return redirect()->route('psetengah.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    // Menghapus data penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        // Kembalikan stok ke produk
        $produk = SetengahJadi::find($penjualan->produk_id);
        if ($produk) {
            $produk->stok += $penjualan->jumlah_item;
            $produk->save();
        }

        $penjualan->delete();

        return redirect()->route('psetengah.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}