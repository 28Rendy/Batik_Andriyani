<?php

use Illuminate\Database\Seeder;
use App\Models\Motif;
use App\Models\Ukuran;
use App\Models\JenisKain;
use App\Models\ProduksiSendiri;
use App\Models\SetengahJadi;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use App\Models\Galeri;

class BatikDataSeeder extends Seeder
{
    public function run()
    {
        // ==========================================
        // 1. KATEGORI BATIK: MOTIF
        // ==========================================
        $motifs = [
            [
                'kode_motif' => 'MTF-001',
                'nama' => 'Sekar Jagad',
                'deskripsi' => 'Motif klasik khas nusantara lambang keanekaragaman, keindahan, dan pesona alam yang harmonis.',
                'harga' => 50000,
            ],
            [
                'kode_motif' => 'MTF-002',
                'nama' => 'Ambringan',
                'deskripsi' => 'Motif anggun dengan nuansa flora khas pesisir yang melambangkan kelemahlembutan budi pekerti.',
                'harga' => 45000,
            ],
            [
                'kode_motif' => 'MTF-003',
                'nama' => 'Buketan',
                'deskripsi' => 'Motif rangkaian buket bunga berpadu corak tradisional dan modern bernuansa ceria serta dinamis.',
                'harga' => 40000,
            ],
            [
                'kode_motif' => 'MTF-004',
                'nama' => 'Suluran',
                'deskripsi' => 'Motif sulur dedaunan saling mengikat melambangkan ikatan tali silaturahmi dan kehidupan yang bertumbuh.',
                'harga' => 35000,
            ],
        ];

        foreach ($motifs as $m) {
            Motif::updateOrCreate(['kode_motif' => $m['kode_motif']], $m);
        }

        // ==========================================
        // 2. KATEGORI BATIK: JENIS KAIN
        // ==========================================
        $jenisKains = [
            [
                'nama' => 'Katun Primissima',
                'deskripsi' => 'Kain katun kualitas tertinggi, serat sangat rapat dan halus, adem saat dikenakan serta menyerap warna secara sempurna.',
                'harga' => 75000,
            ],
            [
                'nama' => 'Katun Prima',
                'deskripsi' => 'Kain katun standar pengrajin batik tulis, lembut, kuat, dan nyaman digunakan untuk busana harian.',
                'harga' => 50000,
            ],
            [
                'nama' => 'Sutra Alam',
                'deskripsi' => 'Kain sutra asli bertekstur sangat lembut, jatuh anggun, berkilau mewah, dan eksklusif untuk acara resmi.',
                'harga' => 180000,
            ],
        ];

        foreach ($jenisKains as $jk) {
            JenisKain::updateOrCreate(['nama' => $jk['nama']], $jk);
        }

        // ==========================================
        // 3. KATEGORI BATIK: UKURAN
        // ==========================================
        $ukurans = [
            [
                'ukuran' => '200 x 115 cm',
                'deskripsi' => 'Ukuran standar untuk bahan kemeja lengan panjang pria atau jarik bawahan wanita.',
            ],
            [
                'ukuran' => '250 x 115 cm',
                'deskripsi' => 'Ukuran panjang ekstra ideal untuk gamis, selendang panjang, atau dress terusan.',
            ],
            [
                'ukuran' => '180 x 100 cm',
                'deskripsi' => 'Ukuran medium untuk bahan atasan blus, kemeja pendek, atau rok lilit.',
            ],
        ];

        foreach ($ukurans as $u) {
            Ukuran::updateOrCreate(['ukuran' => $u['ukuran']], $u);
        }

        // Ambil ID referensi
        $m1 = Motif::where('kode_motif', 'MTF-001')->first();
        $m2 = Motif::where('kode_motif', 'MTF-002')->first();
        $m3 = Motif::where('kode_motif', 'MTF-003')->first();
        $m4 = Motif::where('kode_motif', 'MTF-004')->first();

        $k1 = JenisKain::where('nama', 'Katun Primissima')->first();
        $k2 = JenisKain::where('nama', 'Katun Prima')->first();
        $k3 = JenisKain::where('nama', 'Sutra Alam')->first();

        $u1 = Ukuran::where('ukuran', '200 x 115 cm')->first();
        $u2 = Ukuran::where('ukuran', '250 x 115 cm')->first();
        $u3 = Ukuran::where('ukuran', '180 x 100 cm')->first();

        // ==========================================
        // 4. DATA BARANG: PRODUKSI SENDIRI
        // ==========================================
        $produksiSendiris = [
            [
                'kode_produk' => '001',
                'nama_produk' => 'Kain Batik Tulis Sekar Jagad Eksklusif',
                'motif_id' => $m1->id,
                'jenis_kain_id' => $k1->id,
                'ukuran_id' => $u1->id,
                'stok' => 15,
                'harga' => 450000,
                'foto' => '1748165093_blueHarmony.png',
            ],
            [
                'kode_produk' => '002',
                'nama_produk' => 'Kain Batik Tulis Ambringan Pesisir',
                'motif_id' => $m2->id,
                'jenis_kain_id' => $k2->id,
                'ukuran_id' => $u1->id,
                'stok' => 10,
                'harga' => 375000,
                'foto' => '1748165673_blazingBlossoms.png',
            ],
            [
                'kode_produk' => '003',
                'nama_produk' => 'Kain Batik Tulis Buketan Sutra Premium',
                'motif_id' => $m3->id,
                'jenis_kain_id' => $k3->id,
                'ukuran_id' => $u2->id,
                'stok' => 8,
                'harga' => 650000,
                'foto' => '1748166258_jawa2.png',
            ],
            [
                'kode_produk' => '004',
                'nama_produk' => 'Kain Batik Tulis Suluran Daun Hijau',
                'motif_id' => $m4->id,
                'jenis_kain_id' => $k1->id,
                'ukuran_id' => $u3->id,
                'stok' => 12,
                'harga' => 320000,
                'foto' => '1750513963_D1ng7o7Tcx.png',
            ],
        ];

        foreach ($produksiSendiris as $ps) {
            ProduksiSendiri::updateOrCreate(
                ['kode_produk' => $ps['kode_produk']],
                $ps
            );
        }

        // ==========================================
        // 5. DATA BARANG: SETENGAH JADI
        // ==========================================
        $setengahJadis = [
            [
                'kode_produk' => 'SJ-001',
                'nama_produk' => 'Bahan Pola Kemeja Batik Sekar Jagad',
                'motif_id' => $m1->id,
                'jenis_kain_id' => $k1->id,
                'ukuran_id' => $u1->id,
                'stok' => 20,
                'harga' => 250000,
                'foto' => '1750514045_opa4UbJMsa.png',
            ],
            [
                'kode_produk' => 'SJ-002',
                'nama_produk' => 'Bahan Pola Kain Polos Motif Buketan',
                'motif_id' => $m3->id,
                'jenis_kain_id' => $k2->id,
                'ukuran_id' => $u3->id,
                'stok' => 14,
                'harga' => 190000,
                'foto' => '1750514221_krIFSBWEuD.png',
            ],
            [
                'kode_produk' => 'SJ-003',
                'nama_produk' => 'Kain Mori Berpola Lilin Motif Ambringan',
                'motif_id' => $m2->id,
                'jenis_kain_id' => $k1->id,
                'ukuran_id' => $u2->id,
                'stok' => 25,
                'harga' => 175000,
                'foto' => '1750514283_AIsuApsGTr.png',
            ],
        ];

        foreach ($setengahJadis as $sj) {
            SetengahJadi::updateOrCreate(
                ['kode_produk' => $sj['kode_produk']],
                $sj
            );
        }

        // Ambil produk untuk referensi penjualan
        $ps1 = ProduksiSendiri::where('kode_produk', '001')->first();
        $ps3 = ProduksiSendiri::where('kode_produk', '003')->first();
        $sj1 = SetengahJadi::where('kode_produk', 'SJ-001')->first();
        $sj2 = SetengahJadi::where('kode_produk', 'SJ-002')->first();

        // ==========================================
        // 6. PENJUALAN: PRODUKSI SENDIRI & SETENGAH JADI
        // ==========================================
        $penjualans = [
            [
                'tanggal_penjualan' => '2026-10-25',
                'nama_pelanggan' => 'Hj. Siti Rahmawati',
                'produk_id' => $ps1 ? $ps1->id : 1,
                'kode_produk' => $ps1 ? $ps1->kode_produk : 'MTF-001-001',
                'nama_produk' => 'Kain Batik Tulis Sekar Jagad Eksklusif',
                'sumber_produk' => 'produksi_sendiri',
                'jumlah_item' => 2,
                'harga_satuan' => 450000,
                'total_bayar' => 900000,
                'keterangan' => 'Pesanan seragam hajatan keluarga',
                'status_pembayaran' => 'lunas',
            ],
            [
                'tanggal_penjualan' => '2026-10-28',
                'nama_pelanggan' => 'Bapak Bambang Wijaya',
                'produk_id' => $ps3 ? $ps3->id : 3,
                'kode_produk' => $ps3 ? $ps3->kode_produk : 'MTF-003-003',
                'nama_produk' => 'Kain Batik Tulis Buketan Sutra Premium',
                'sumber_produk' => 'produksi_sendiri',
                'jumlah_item' => 1,
                'harga_satuan' => 650000,
                'total_bayar' => 650000,
                'keterangan' => 'Pembelian kado eksklusif untuk kolega',
                'status_pembayaran' => 'lunas',
            ],
            [
                'tanggal_penjualan' => '2026-10-26',
                'nama_pelanggan' => 'Konveksi Berkah Jaya',
                'produk_id' => $sj1 ? $sj1->id : 1,
                'kode_produk' => $sj1 ? $sj1->kode_produk : 'MTF-001-SJ-001',
                'nama_produk' => 'Bahan Pola Kemeja Batik Sekar Jagad',
                'sumber_produk' => 'setengah_jadi',
                'jumlah_item' => 5,
                'harga_satuan' => 250000,
                'total_bayar' => 1250000,
                'keterangan' => 'Bahan pembuatan kemeja kantor pesanan instansi',
                'status_pembayaran' => 'lunas',
            ],
            [
                'tanggal_penjualan' => '2026-10-29',
                'nama_pelanggan' => 'Ibu Dewi Sartika',
                'produk_id' => $sj2 ? $sj2->id : 2,
                'kode_produk' => $sj2 ? $sj2->kode_produk : 'MTF-003-SJ-002',
                'nama_produk' => 'Bahan Pola Kain Polos Motif Buketan',
                'sumber_produk' => 'setengah_jadi',
                'jumlah_item' => 2,
                'harga_satuan' => 190000,
                'total_bayar' => 380000,
                'keterangan' => 'Bahan untuk pembuatan gamis pesta',
                'status_pembayaran' => 'lunas',
            ],
        ];

        foreach ($penjualans as $p) {
            Penjualan::updateOrCreate(
                [
                    'tanggal_penjualan' => $p['tanggal_penjualan'],
                    'nama_pelanggan' => $p['nama_pelanggan'],
                    'nama_produk' => $p['nama_produk'],
                ],
                $p
            );
        }

        // ==========================================
        // 7. MENU KEUANGAN LAIN: PENGELUARAN KAS
        // ==========================================
        $pengeluarans = [
            [
                'tanggal' => '2026-10-24',
                'kategori' => 'Bahan Baku & Malam',
                'keterangan' => 'Pembelian lilin malam batik kualitas super dan canting kuningan',
                'jumlah' => 5,
                'total' => 350000,
                'penerima' => 'Toko Bahan Kimia Batik Sejahtera',
                'metode_pembayaran' => 'Transfer Bank',
            ],
            [
                'tanggal' => '2026-10-27',
                'kategori' => 'Pewarna Alami & Kimia',
                'keterangan' => 'Pembelian zat pewarna naptol dan remasol untuk 20 kain batik',
                'jumlah' => 10,
                'total' => 480000,
                'penerima' => 'Pewarna Alam Nusantara',
                'metode_pembayaran' => 'Tunai',
            ],
            [
                'tanggal' => '2026-10-28',
                'kategori' => 'Operasional Workshop',
                'keterangan' => 'Biaya perawatan kompor minyak batik dan listrik workshop',
                'jumlah' => 1,
                'total' => 250000,
                'penerima' => 'PLN & Pengelola Workshop',
                'metode_pembayaran' => 'Transfer Bank',
            ],
        ];

        foreach ($pengeluarans as $pk) {
            Pengeluaran::updateOrCreate(
                [
                    'tanggal' => $pk['tanggal'],
                    'keterangan' => $pk['keterangan'],
                ],
                $pk
            );
        }

        // ==========================================
        // 8. GALERI TAMBAHAN (Agar Frontend Galeri Penuh & Menarik)
        // ==========================================
        $galeris = [
            [
                'judul' => 'Batik Motif Blue Harmony Tegal',
                'deskripsi' => 'Corak batik tulis pesisir dengan paduan warna biru dan motif bunga yang menawan.',
                'gambar' => 'photos/1748165093_blueHarmony.png',
                'urutan' => 4,
                'aktif' => true,
            ],
            [
                'judul' => 'Proses Canting & Pewarnaan Blazing',
                'deskripsi' => 'Sentuhan tangan pengrajin terampil menghasilkan detail warna merah hangat membara.',
                'gambar' => 'photos/1748165673_blazingBlossoms.png',
                'urutan' => 5,
                'aktif' => true,
            ],
            [
                'judul' => 'Karya Seni Batik Etnik Klasik',
                'deskripsi' => 'Pesona warisan luhur batik nusantara dengan detail motif geometris penuh filosofi.',
                'gambar' => 'photos/1748166258_jawa2.png',
                'urutan' => 6,
                'aktif' => true,
            ],
        ];

        foreach ($galeris as $g) {
            Galeri::updateOrCreate(['judul' => $g['judul']], $g);
        }

        $this->command->info('BatikDataSeeder berhasil: Data Barang, Kategori Batik, Penjualan, Keuangan, dan Galeri telah diisi.');
    }
}

