<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan'); // form pilih jenis & periode
    }

    public function show(Request $request)
    {
        $periode = $request->get('periode'); // All atau periode
        $produkType = $request->get('jenis'); // produksi_sendiri atau setengah_jadi

        $data = [];

        if ($periode == 'All') {
            if ($produkType == 'produksi_sendiri') {
                $data = DB::table('penjualan_batik')
                    ->where('sumber_produk', 'produksi_sendiri')
                    ->get();
            } elseif ($produkType == 'setengah_jadi') {
                $data = DB::table('penjualan_batik')
                    ->where('sumber_produk', 'setengah_jadi')
                    ->get();
            }
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');

            if ($produkType == 'produksi_sendiri') {
                $data = DB::table('penjualan_batik')
                    ->where('sumber_produk', 'produksi_sendiri')
                    ->whereBetween('tanggal_penjualan', [$tglawal, $tglakhir])
                    ->orderBy('tanggal_penjualan', 'ASC')
                    ->get();
            } elseif ($produkType == 'setengah_jadi') {
                $data = DB::table('penjualan_batik')
                    ->where('sumber_produk', 'setengah_jadi')
                    ->whereBetween('tanggal_penjualan', [$tglawal, $tglakhir])
                    ->orderBy('tanggal_penjualan', 'ASC')
                    ->get();
            }
        }
        

        // Pilih view sesuai jenis laporan
        $view = ''; // default
        if ($produkType === 'produksi_sendiri') {
            $view = 'penjualan.laporan_produksi_pdf';
        } elseif ($produkType === 'setengah_jadi') {
            $view = 'penjualan.laporan_produksi_pdf';
        }
        


        // Render PDF
        $pdf = PDF::loadView($view, ['data' => $data , 'produkType' => $produkType])
            ->setPaper('A4', 'landscape');

        return $pdf->stream();
    }

    public function pengeluaran(Request $request) {
        $periode = $request->get('periode'); // All atau periode
        $data = [];

        if ($periode == 'All') {
            $data = DB::table('pengeluaran') ->get();
        
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');

            $data = DB::table('pengeluaran')
                ->whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal', 'ASC')
                ->get();
        }
     
        $pdf = PDF::loadView('pengeluaran.laporan_pengeluaran_pdf', ['data' => $data])
            ->setPaper('A4', 'landscape');

        return $pdf->stream();


    }

}
