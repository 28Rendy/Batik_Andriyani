<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\ProduksiSendiri;
use App\Models\SetengahJadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produksi = ProduksiSendiri::with(['motif', 'JenisKain', 'ukuran'])->latest()->take(3)->get();
        $setengah = SetengahJadi::with(['motif', 'JenisKain', 'ukuran'])->latest()->take(3)->get();
        return view('home', compact('produksi', 'setengah'));
    }

    public function getChartData()
    {
        // PERBAIKAN: Menggunakan COUNT(*) untuk menghitung jumlah transaksi
        // bukan SUM(jumlah_item) untuk menghitung total item

        $produksiSendiri = DB::table('penjualan_batik')
            ->selectRaw("DATE_FORMAT(tanggal_penjualan, '%Y-%m') as bulan, COUNT(*) as total")
            ->where('sumber_produk', 'produksi_sendiri')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $setengahJadi = DB::table('penjualan_batik')
            ->selectRaw("DATE_FORMAT(tanggal_penjualan, '%Y-%m') as bulan, COUNT(*) as total")
            ->where('sumber_produk', 'setengah_jadi')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return response()->json([
            'produksi_sendiri' => $produksiSendiri,
            'setengah_jadi' => $setengahJadi
        ]);
    }

    // Jika Anda juga ingin fungsi terpisah untuk chart berdasarkan jumlah item
    public function getChartDataByItems()
    {
        $produksiSendiri = DB::table('penjualan_batik')
            ->selectRaw("DATE_FORMAT(tanggal_penjualan, '%Y-%m') as bulan, SUM(jumlah_item) as total")
            ->where('sumber_produk', 'produksi_sendiri')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $setengahJadi = DB::table('penjualan_batik')
            ->selectRaw("DATE_FORMAT(tanggal_penjualan, '%Y-%m') as bulan, SUM(jumlah_item) as total")
            ->where('sumber_produk', 'setengah_jadi')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return response()->json([
            'produksi_sendiri' => $produksiSendiri,
            'setengah_jadi' => $setengahJadi
        ]);
    }

    public function getStokChartData()
    {
        $produksiSendiri = DB::table('produksi_sendiri')
            ->select('nama_produk', 'stok')
            ->get();

        $setengahJadi = DB::table('setengah_jadi')
            ->select('nama_produk', 'stok')
            ->get();

        return response()->json([
            'produksi_sendiri' => $produksiSendiri,
            'setengah_jadi' => $setengahJadi
        ]);
    }
}