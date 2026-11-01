<?php

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\HeroSlider;
use App\Models\Faq;

class CmsSeeder extends Seeder
{
    public function run()
    {
        // ===== SITE SETTINGS =====
        $settings = [
            ['key' => 'nama_toko',       'value' => 'Aruna Batik Nusantara',          'type' => 'text',     'label' => 'Nama Toko'],
            ['key' => 'tagline',         'value' => 'Keanggunan Mahakarya Batik Tulis Nusantara', 'type' => 'text', 'label' => 'Tagline / Slogan'],
            ['key' => 'deskripsi_toko',  'value' => 'Aruna Batik Nusantara adalah produsen dan galeri batik tulis berkualitas tinggi yang berbasis di Tegal, Jawa Tengah. Kami menghadirkan mahakarya batik autentik perpaduan seni tradisional nusantara dan estetika modern.', 'type' => 'textarea', 'label' => 'Deskripsi Toko'],
            ['key' => 'alamat',          'value' => 'Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113', 'type' => 'text', 'label' => 'Alamat Toko'],
            ['key' => 'whatsapp',        'value' => '6281234567890',                  'type' => 'text',     'label' => 'Nomor WhatsApp (tanpa +)'],
            ['key' => 'email',           'value' => 'kontak@arunabatik.com',          'type' => 'text',     'label' => 'Email Toko'],
            ['key' => 'jam_buka',        'value' => 'Senin–Sabtu: 08.30–17.00 WIB',   'type' => 'text',     'label' => 'Jam Operasional'],
            ['key' => 'logo',            'value' => 'asset/img/logo_batik.png',       'type' => 'image',    'label' => 'Logo Toko'],
            ['key' => 'footer_teks',     'value' => '© 2025 SIMARA - Aruna Batik Nusantara. Hak cipta dilindungi.', 'type' => 'text', 'label' => 'Teks Footer'],
            ['key' => 'facebook',        'value' => 'https://facebook.com',           'type' => 'text',     'label' => 'URL Facebook'],
            ['key' => 'instagram',       'value' => 'https://instagram.com',          'type' => 'text',     'label' => 'URL Instagram'],
            ['key' => 'tentang_judul',   'value' => 'Tentang Aruna Batik Nusantara',  'type' => 'text',     'label' => 'Judul Halaman Tentang'],
            ['key' => 'tentang_isi',     'value' => 'Aruna Batik Nusantara berakar dari kecintaan terhadap warisan mahakarya kain batik nusantara, khususnya corak pesisiran Jawa Tengah. Kami berkomitmen menjaga keluhuran teknik batik tulis tradisional dengan sentuhan pewarnaan alami dan inovasi desain kontemporer.', 'type' => 'textarea', 'label' => 'Isi Halaman Tentang'],
            ['key' => 'visi',            'value' => 'Menjadi pusat rujukan mahakarya batik tulis berkualitas tinggi yang membanggakan warisan nusantara di kancah nasional dan internasional.', 'type' => 'textarea', 'label' => 'Visi'],
            ['key' => 'misi',            'value' => "1. Memproduksi kain batik tulis autentik dengan standar mutu tertinggi.\n2. Mengedukasi masyarakat luas tentang filosofi dan pelestarian corak batik nusantara.\n3. Memberdayakan pembatik dan perajin lokal di sentra daerah.", 'type' => 'textarea', 'label' => 'Misi'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // ===== HERO SLIDERS =====
        $sliders = [
            ['judul' => 'Selamat Datang di Aruna Batik',     'deskripsi' => 'Temukan koleksi batik tulis premium dengan motif khas pesisiran dan Nusantara', 'gambar' => 'photos/slider_1.png', 'urutan' => 1, 'aktif' => true],
            ['judul' => 'Koleksi Mahakarya Eksklusif',       'deskripsi' => 'Batik tulis dengan bahan sutra & katun primissima serta pewarna alami berkualitas tinggi', 'gambar' => 'photos/slider_2.png', 'urutan' => 2, 'aktif' => true],
            ['judul' => 'Layanan Batik Custom & Seragam',     'deskripsi' => 'Melayani pembuatan batik khusus instansi, keluarga, dan motif personal pilihan Anda', 'gambar' => 'photos/slider_3.png', 'urutan' => 3, 'aktif' => true],
        ];

        foreach ($sliders as $s) {
            HeroSlider::updateOrCreate(['judul' => $s['judul']], $s);
        }

        // ===== FAQ =====
        $faqs = [
            ['pertanyaan' => 'Apakah batik di Aruna Batik 100% tulis tangan?', 'jawaban' => 'Ya, seluruh koleksi batik tulis kami adalah hasil canting tangan autentik yang dikerjakan oleh para pembatik berpengalaman.', 'urutan' => 1, 'aktif' => true],
            ['pertanyaan' => 'Apakah bisa memesan desain batik custom?', 'jawaban' => 'Tentu bisa! Kami melayani pesanan khusus (custom motif, ukuran kain, serta warna seragam). Silakan konsultasikan kebutuhan Anda via WhatsApp.', 'urutan' => 2, 'aktif' => true],
            ['pertanyaan' => 'Berapa lama estimasi pengerjaan batik tulis custom?', 'jawaban' => 'Proses pengerjaan batik tulis memakan waktu rata-rata 2–4 minggu bergantung pada kerumitan pola dan proses pewarnaan.', 'urutan' => 3, 'aktif' => true],
            ['pertanyaan' => 'Apakah melayani pengiriman ke seluruh Indonesia?', 'jawaban' => 'Ya, kami melayani pengiriman aman ke seluruh kota di Indonesia melalui jasa ekspedisi terpercaya (JNE, POS, J&T, SiCepat).', 'urutan' => 4, 'aktif' => true],
            ['pertanyaan' => 'Bagaimana cara merawat kain batik tulis agar awet?', 'jawaban' => 'Cucilah menggunakan sabun lerak atau shampoo khusus, jangan diperas terlalu kuat, dan jemurlah di tempat yang teduh tanpa terpapar terik matahari langsung.', 'urutan' => 5, 'aktif' => true],
        ];

        foreach ($faqs as $s) {
            Faq::updateOrCreate(['pertanyaan' => $s['pertanyaan']], $s);
        }
    }
}
