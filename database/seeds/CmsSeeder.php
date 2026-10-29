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
            ['key' => 'nama_toko',       'value' => 'Batik Andriyani',               'type' => 'text',     'label' => 'Nama Toko'],
            ['key' => 'tagline',         'value' => 'Batik Tulis Khas Nusantara',     'type' => 'text',     'label' => 'Tagline / Slogan'],
            ['key' => 'deskripsi_toko',  'value' => 'Batik Andriyani adalah produsen batik tulis berkualitas tinggi yang menggunakan bahan-bahan pilihan dan motif khas daerah. Kami berkomitmen menghadirkan batik autentik yang memadukan tradisi dan modernitas.', 'type' => 'textarea', 'label' => 'Deskripsi Toko'],
            ['key' => 'alamat',          'value' => 'Jl. Batik No. 1, Kota Batik, Indonesia', 'type' => 'text', 'label' => 'Alamat Toko'],
            ['key' => 'whatsapp',        'value' => '628123456789',                   'type' => 'text',     'label' => 'Nomor WhatsApp (tanpa +)'],
            ['key' => 'email',           'value' => 'info@batikandriyani.com',         'type' => 'text',     'label' => 'Email Toko'],
            ['key' => 'jam_buka',        'value' => 'Senin–Sabtu: 08.00–17.00 WIB',   'type' => 'text',     'label' => 'Jam Operasional'],
            ['key' => 'logo',            'value' => 'asset/img/logo.png',             'type' => 'image',    'label' => 'Logo Toko'],
            ['key' => 'footer_teks',     'value' => '© 2025 Batik Andriyani. Hak cipta dilindungi.', 'type' => 'text', 'label' => 'Teks Footer'],
            ['key' => 'facebook',        'value' => '',                               'type' => 'text',     'label' => 'URL Facebook'],
            ['key' => 'instagram',       'value' => '',                               'type' => 'text',     'label' => 'URL Instagram'],
            ['key' => 'tentang_judul',   'value' => 'Tentang Batik Andriyani',        'type' => 'text',     'label' => 'Judul Halaman Tentang'],
            ['key' => 'tentang_isi',     'value' => 'Batik Andriyani berdiri sejak tahun 2010, bergerak di bidang produksi dan penjualan batik tulis berkualitas. Kami menggunakan pewarna alami dan motif tradisional yang terus kami lestarikan.', 'type' => 'textarea', 'label' => 'Isi Halaman Tentang'],
            ['key' => 'visi',            'value' => 'Menjadi produsen batik tulis terpercaya yang melestarikan budaya nusantara.', 'type' => 'textarea', 'label' => 'Visi'],
            ['key' => 'misi',            'value' => "1. Menghasilkan batik berkualitas tinggi\n2. Melestarikan motif tradisional\n3. Memberdayakan pengrajin lokal", 'type' => 'textarea', 'label' => 'Misi'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // ===== HERO SLIDERS =====
        $sliders = [
            ['judul' => 'Selamat Datang di Batik Andriyani', 'deskripsi' => 'Temukan koleksi batik tulis premium dengan motif khas Nusantara', 'gambar' => 'asset/img/slide1.jpg', 'urutan' => 1, 'aktif' => true],
            ['judul' => 'Koleksi Batik Terbaru',             'deskripsi' => 'Batik tulis dengan bahan pilihan dan pewarna alami berkualitas tinggi', 'gambar' => 'asset/img/slide2.jpg', 'urutan' => 2, 'aktif' => true],
            ['judul' => 'Pesan Batik Custom',                'deskripsi' => 'Tersedia layanan pembuatan batik custom sesuai keinginan Anda', 'gambar' => 'asset/img/slide3.jpg', 'urutan' => 3, 'aktif' => true],
        ];

        foreach ($sliders as $s) {
            HeroSlider::updateOrCreate(['judul' => $s['judul']], $s);
        }

        // ===== FAQ =====
        $faqs = [
            ['pertanyaan' => 'Apakah batik Anda 100% tulis tangan?', 'jawaban' => 'Ya, semua produk kami adalah batik tulis tangan asli yang dikerjakan oleh pengrajin berpengalaman.', 'urutan' => 1, 'aktif' => true],
            ['pertanyaan' => 'Apakah bisa pesan desain custom?', 'jawaban' => 'Tentu bisa! Kami menerima pesanan custom batik dengan motif dan warna sesuai keinginan Anda. Hubungi kami via WhatsApp untuk konsultasi.', 'urutan' => 2, 'aktif' => true],
            ['pertanyaan' => 'Berapa lama waktu pembuatan batik custom?', 'jawaban' => 'Tergantung tingkat kerumitan motif. Umumnya 2–4 minggu untuk batik tulis. Kami akan mengkonfirmasi estimasi waktu saat Anda memesan.', 'urutan' => 3, 'aktif' => true],
            ['pertanyaan' => 'Apakah tersedia pengiriman ke luar kota?', 'jawaban' => 'Ya, kami melayani pengiriman ke seluruh Indonesia melalui berbagai jasa ekspedisi. Ongkos kirim ditanggung pembeli.', 'urutan' => 4, 'aktif' => true],
            ['pertanyaan' => 'Bagaimana cara merawat batik agar awet?', 'jawaban' => 'Cuci dengan tangan menggunakan sabun khusus batik atau shampo, jangan diperas, keringkan di tempat teduh, dan hindari sinar matahari langsung.', 'urutan' => 5, 'aktif' => true],
        ];

        foreach ($faqs as $f) {
            Faq::updateOrCreate(['pertanyaan' => $f['pertanyaan']], $f);
        }

        $this->command->info('CMS Seeder berhasil: Site Settings, Hero Sliders, FAQ telah diisi.');
    }
}

