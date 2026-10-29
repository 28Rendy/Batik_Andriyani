<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\HeroSlider;
use App\Models\Pesanan;
use App\Models\ProduksiSendiri;
use App\Models\SetengahJadi;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Beranda Publik
     */
    public function home()
    {
        $sliders = HeroSlider::where('aktif', true)->orderBy('urutan', 'asc')->get();
        $produkUnggulan = ProduksiSendiri::with(['motif', 'JenisKain', 'ukuran'])->latest()->take(6)->get();
        $beritaTerbaru = Berita::where('status', 'published')->latest('published_at')->take(3)->get();
        $faqs = Faq::where('aktif', true)->orderBy('urutan', 'asc')->take(5)->get();
        $galeri = Galeri::where('aktif', true)->orderBy('urutan', 'asc')->take(6)->get();

        return view('frontend.home', compact('sliders', 'produkUnggulan', 'beritaTerbaru', 'faqs', 'galeri'));
    }

    /**
     * Katalog Produk
     */
    public function produk(Request $request)
    {
        $kategori = $request->query('kategori', 'semua');
        $q = $request->query('q');

        $querySendiri = ProduksiSendiri::with(['motif', 'JenisKain', 'ukuran']);
        $querySetengah = SetengahJadi::with(['motif', 'JenisKain', 'ukuran']);

        if ($q) {
            $querySendiri->where('nama_produk', 'like', "%{$q}%");
            $querySetengah->where('nama_produk', 'like', "%{$q}%");
        }

        $produkSendiri = ($kategori == 'semua' || $kategori == 'produksi_sendiri') ? $querySendiri->latest()->get() : collect();
        $produkSetengah = ($kategori == 'semua' || $kategori == 'setengah_jadi') ? $querySetengah->latest()->get() : collect();

        return view('frontend.produk.index', compact('produkSendiri', 'produkSetengah', 'kategori', 'q'));
    }

    /**
     * Detail Produk
     */
    public function detailProduk($kategori, $id)
    {
        if ($kategori == 'setengah_jadi') {
            $produk = SetengahJadi::with(['motif', 'JenisKain', 'ukuran'])->findOrFail($id);
            $sumber = 'setengah_jadi';
        } else {
            $produk = ProduksiSendiri::with(['motif', 'JenisKain', 'ukuran'])->findOrFail($id);
            $sumber = 'produksi_sendiri';
        }

        $waNumber = SiteSetting::getSetting('whatsapp', '628123456789');

        return view('frontend.produk.show', compact('produk', 'sumber', 'waNumber'));
    }

    /**
     * Galeri Foto
     */
    public function galeri()
    {
        $galeri = Galeri::where('aktif', true)->orderBy('urutan', 'asc')->latest()->paginate(12);
        return view('frontend.galeri', compact('galeri'));
    }

    /**
     * Daftar Berita / Artikel
     */
    public function berita(Request $request)
    {
        $q = $request->query('q');
        $query = Berita::where('status', 'published')->latest('published_at');

        if ($q) {
            $query->where(function($b) use ($q) {
                $b->where('title', 'like', "%{$q}%")
                  ->orWhere('content', 'like', "%{$q}%");
            });
        }

        $berita = $query->paginate(6);
        $recentBerita = Berita::where('status', 'published')->latest('published_at')->take(4)->get();

        return view('frontend.berita.index', compact('berita', 'recentBerita', 'q'));
    }

    /**
     * Detail Berita
     */
    public function detailBerita($id)
    {
        $berita = Berita::where('status', 'published')->findOrFail($id);
        $recentBerita = Berita::where('status', 'published')->where('id', '!=', $id)->latest('published_at')->take(4)->get();

        return view('frontend.berita.show', compact('berita', 'recentBerita'));
    }

    /**
     * Halaman Tentang Kami
     */
    public function tentang()
    {
        return view('frontend.tentang');
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        $faqs = Faq::where('aktif', true)->orderBy('urutan', 'asc')->get();
        return view('frontend.kontak', compact('faqs'));
    }

    /**
     * Form Checkout / Buat Pesanan
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'sumber_produk' => 'required|in:produksi_sendiri,setengah_jadi',
            'jumlah' => 'required|integer|min:1',
            'nama_produk' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        // Jika belum login, simpan session pesanan dan arahkan ke login atau register
        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'Silakan masuk atau daftar terlebih dahulu untuk menyelesaikan pesanan Anda.');
        }

        $user = auth()->user();
        $total = $request->harga_satuan * $request->jumlah;

        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'produk_id' => $request->produk_id,
            'sumber_produk' => $request->sumber_produk,
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $total,
            'catatan' => $request->catatan,
            'status_pesanan' => 'pending',
            'status_pengiriman' => 'menunggu',
            'alamat_pengiriman' => $request->alamat_pengiriman ?? $user->address,
            'no_hp' => $request->no_hp ?? $user->phone,
        ]);

        return redirect()->route('pelanggan.pesanan.detail', $pesanan->id)->with('success', 'Pesanan Anda berhasil dibuat! Admin kami akan segera memprosesnya.');
    }
}

