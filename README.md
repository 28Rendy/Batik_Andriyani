# 🎨 Batik Andriyani - Sistem Informasi Penjualan & CMS Website

<p align="center">
  <img src="public/asset/img/logo_batik.png" alt="Logo Batik Andriyani" width="160" style="border-radius: 15px;">
</p>

<p align="center">
  <strong>Website E-Commerce & Sistem Manajemen Konten (CMS) Batik Tulis Nusantara</strong>
</p>

<p align="center">
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-6.x%2F7.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"></a>
  <a href="https://php.net"><img src="https://img.shields.io/badge/PHP-7.4%20|%208.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"></a>
  <a href="https://mariadb.org"><img src="https://img.shields.io/badge/Database-MySQL%20%7C%20MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"></a>
  <a href="https://getbootstrap.com"><img src="https://img.shields.io/badge/Frontend-Bootstrap%205-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5"></a>
  <a href="https://github.com/28Rendy/Batik_Andriyani"><img src="https://img.shields.io/badge/Repo-GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub"></a>
</p>

---

## 📌 Tentang Proyek

**Batik Andriyani** adalah aplikasi berbasis web yang mengintegrasikan **Katalog Penjualan Online Publik**, **Portal Pelanggan**, serta **Sistem Informasi Manajemen & CMS Toko Batik**. Dibuat untuk mempermudah operasional UMKM batik tulis mulai dari pencatatan inventaris, manajemen pesanan online, rekapitulasi keuangan kas, hingga publikasi konten promosi.

---

## ✨ Fitur-Fitur Utama

### 🛍️ 1. Halaman Publik (Frontend)
- **Beranda Interaktif**: Hero slider banner dinamis, etalase batik unggulan, profil filosofi usaha, dan integrasi pemesanan WhatsApp.
- **Top Navigation Bar Responsif**: Dilengkapi tombol scroll panah kiri/kanan & indikator baris scroll agar menu tetap rapi di semua resolusi layar.
- **Katalog Produk Lengkap**:
  - Filter kategori (*Batik Jadi / Produksi Sendiri* vs *Kain Setengah Jadi*).
  - Fitur pencarian produk real-time berdasarkan nama batik atau motif.
- **Galeri Foto & Berita Batik**: Dokumentasi motif karya pengrajin serta artikel edukasi budaya batik.
- **Tentang Kami & Kontak / FAQ**: Accordion interaktif tanya-jawab dan peta/kontak toko.

### 👤 2. Portal Pelanggan
- **Registrasi & Login Akun**: Pendaftaran mandiri pelanggan.
- **Dashboard Pesanan**: Memantau status pesanan (Menunggu Pembayaran, Diproses, Dikirim, Selesai).
- **Pengaturan Profil**: Pengelolaan data diri, alamat pengiriman, dan upload foto profil.

### ⚙️ 3. Backend Admin (Panel Manajemen)
- **Active State Indicator Sidebar**: Navigasi sidebar dengan blok warna dinamis bergradien emas-cokelat yang menandakan posisi menu dan sub-menu yang sedang aktif.
- **Data Barang & Kategori**: Manajemen inventaris kain setengah jadi, produksi sendiri, jenis kain, motif, dan ukuran.
- **Transaksi & Penjualan**: Pencatatan transaksi penjualan kasir/toko.
- **Keuangan (Buku Kas)**: Pencatatan pengeluaran kas operasional toko.
- **Kelola Pesanan Online**: Konfirmasi pembayaran dan pembaruan resi / status pesanan dari pelanggan.
- **CMS (Content Management System)**:
  - Kelola Identitas Toko, Logo, Kontak & Media Sosial.
  - Kelola Hero Slider (Banner Beranda).
  - Kelola Galeri Foto & Album.
  - Kelola Tanya Jawab (FAQ).
  - Kelola Berita & Artikel Edukasi.
- **Laporan**: Rekapitulasi laporan penjualan dan pengeluaran.

---

## 🚀 Panduan Instalasi & Menjalankan (Lokal)

Ikuti langkah mudah di bawah ini untuk menjalankan proyek di laptop Anda (Laragon / XAMPP):

### 1. Prasyarat Sistem
- **Web Server Local**: [Laragon](https://laragon.org/) *(sangat disarankan)* atau [XAMPP](https://www.apachefriends.org/)
- **PHP**: Versi 7.4 atau 8.0 - 8.3
- **Database**: MySQL / MariaDB
- **Composer**: [Download Composer](https://getcomposer.org/)
- **Git**: [Download Git](https://git-scm.com/)

---

### 2. Langkah-Langkah Cepat

#### 📥 Langkah 1: Clone Repository
Buka terminal (Git Bash / PowerShell / Command Prompt), arahkan ke folder web server Anda (`C:\laragon\www\` atau `C:\xampp\htdocs\`), lalu jalankan:

```bash
git clone https://github.com/28Rendy/Batik_Andriyani.git
cd Batik_Andriyani
```

---

#### 📦 Langkah 2: Install Dependensi PHP
Jalankan composer untuk mengunduh package Laravel:

```bash
composer install
```

---

#### ⚙️ Langkah 3: Konfigurasi File Environment (`.env`)
Salin file `.env.example` menjadi `.env`:

*Untuk Windows (PowerShell / CMD):*
```powershell
copy .env.example .env
```
*Untuk Git Bash / Linux / macOS:*
```bash
cp .env.example .env
```

Buka file `.env` di text editor (VS Code, Notepad, dll), lalu sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=andriyani_batik
DB_USERNAME=root
DB_PASSWORD=
```

> **Catatan:** Buat database kosong bernama `andriyani_batik` di **phpMyAdmin** (`http://localhost/phpmyadmin`) atau HeidiSQL terlebih dahulu.

---

#### 🔑 Langkah 4: Generate Application Key
Jalankan perintah ini untuk membuat key aplikasi baru:

```bash
php artisan key:generate
```

---

#### 🗄️ Langkah 5: Migrasi Database & Seeder Data Awal
Jalankan migrasi tabel beserta seeder untuk langsung mengisi data dummy (data barang, motif, kategori, admin, galeri, slider, dan FAQ):

```bash
php artisan migrate --seed
```

> 💡 *Jika ingin mereset ulang seluruh database dari awal kapan saja:*
> ```bash
> php artisan migrate:fresh --seed
> ```

---

#### 🚀 Langkah 6: Jalankan Server Lokal
Jalankan server bawaan Laravel:

```bash
php artisan serve
```

Buka browser dan akses alamat berikut:
- **Halaman Utama (Frontend)**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Halaman Login**: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

---

## 🔑 Akun Demo Default

Setelah menjalankan `php artisan migrate --seed`, akun berikut siap digunakan untuk login:

| Role / Akses | Email / Username | Password | Keterangan |
| :--- | :--- | :--- | :--- |
| **Admin / Pemilik** | `adminpa1@bsi.ac.id` *(atau username: `admin`)* | `admin` | Akses penuh dashboard, barang, keuangan, CMS, dan laporan |
| **Lupa Password** | `/forgot` | - | Menggunakan verifikasi email & Nama Ibu: `Admin` |

---

## 👥 Panduan Kerja Sama Git untuk Teman Kelompok

Agar kode selalu sinkron dan tidak terjadi bentrok (*conflict*) saat mengerjakan tugas kelompok bersama:

### 1. Sebelum Mulai Coding (Wajib `pull` update terbaru)
```bash
git checkout main
git pull origin main
```

### 2. Setelah Selesai Menambahkan Fitur / Memperbaiki Kode
```bash
git add .
git commit -m "Deskripsi perubahan yang Anda buat"
git push origin main
```

### 3. Jika Ada Update Database / Seeder dari Teman
Jika teman menambahkan tabel atau seeder baru setelah Anda melakukan `git pull`, jalankan:
```bash
php artisan migrate
php artisan db:seed
```

### 4. Jika Tampilan View / Blade Tidak Berubah
Jalankan pembersihan cache Blade:
```bash
php artisan view:clear
php artisan cache:clear
```

---

## 📁 Struktur Direktori Penting

```text
Batik_Andriyani/
├── app/
│   ├── Http/Controllers/    # Controller (Frontend, Admin, Pelanggan, Auth)
│   └── Models/              # Model Eloquent Database
├── database/
│   ├── migrations/          # Struktur skema tabel database
│   └── seeds/               # Data seeder otomatis
├── public/
│   ├── asset/               # CSS, JS, Vendor (Bootstrap, SB-Admin, FontAwesome)
│   └── photos/              # Folder penyimpanan foto produk, galeri, slider
├── resources/
│   └── views/
│       ├── auth/            # Halaman Login, Register, Lupa Password
│       ├── frontend/        # Tampilan Landing Page, Produk, Berita, Galeri
│       ├── layouts/         # Layout Admin & Sidebar Panel
│       └── pelanggan/       # Dashboard & Profil Akun Pelanggan
├── routes/
│   └── web.php              # Definisi rute URL aplikasi
└── .env                     # Konfigurasi database & environment lokal
```

---

## 📄 Lisensi
Proyek ini dikembangkan untuk keperluan akademik dan operasional UMKM **Andriyani Batik Indonesia**.

<p align="center">
  Dibuat dengan ❤️ oleh Tim Proyek Batik Andriyani
</p>
