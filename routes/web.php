<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Frontend Routes (Multi-Page Publik)
|--------------------------------------------------------------------------
*/
Route::get('/', 'FrontendController@home')->name('frontend.home');
Route::get('/produk', 'FrontendController@produk')->name('frontend.produk');
Route::get('/produk/{kategori}/{id}', 'FrontendController@detailProduk')->name('frontend.produk.detail');
Route::get('/galeri', 'FrontendController@galeri')->name('frontend.galeri');
Route::get('/berita-batik', 'FrontendController@berita')->name('frontend.berita');
Route::get('/berita-batik/{id}', 'FrontendController@detailBerita')->name('frontend.berita.detail');
Route::get('/tentang-kami', 'FrontendController@tentang')->name('frontend.tentang');
Route::get('/kontak', 'FrontendController@kontak')->name('frontend.kontak');
Route::post('/checkout', 'FrontendController@checkout')->name('frontend.checkout');

/*
|--------------------------------------------------------------------------
| Autentikasi Pengguna
|--------------------------------------------------------------------------
*/
Auth::routes();

// Registrasi Khusus Pelanggan
Route::get('/register-pelanggan', 'PelangganController@showRegister')->name('register.pelanggan');
Route::post('/register-pelanggan', 'PelangganController@register')->name('register.pelanggan.store');

// Lupa Password
Route::get('/forgot', 'ForgotController@create')->name('forgot.create');
Route::post('/forgot', 'ForgotController@store')->name('forgot.store');
Route::get('/forgot/reset', 'ForgotController@edit')->name('forgot.edit');
Route::put('/forgot/reset', 'ForgotController@update')->name('forgot.update');

/*
|--------------------------------------------------------------------------
| Portal Khusus Pelanggan (Setelah Login Sebagai Pelanggan)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', 'PelangganController@dashboard')->name('dashboard');
    Route::get('/pesanan', 'PelangganController@pesanan')->name('pesanan');
    Route::get('/pesanan/{id}', 'PelangganController@detailPesanan')->name('pesanan.detail');
    Route::get('/profil', 'PelangganController@profil')->name('profil');
    Route::put('/profil', 'PelangganController@updateProfil')->name('profil.update');
});

/*
|--------------------------------------------------------------------------
| Dashboard & Fitur Admin / Pemilik / Staff
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/api/chart-data', 'HomeController@getChartData');
    Route::get('/api/stok-chart', 'HomeController@getStokChartData');

    // Master Data Barang & Kategori
    Route::resource('/persediaan', 'PersediaanController');
    Route::resource('/Psendiri', 'ProduksiSendiriController');
    Route::resource('/Sjadi', 'SetengahJadiController');
    Route::resource('/motif', 'MotifController');
    Route::resource('/ukuran', 'UkuranController');
    Route::resource('/Jkain', 'JenisKainController');

    // Penjualan & Pengeluaran
    Route::resource('/psetengah', 'PSetengahJadiController');
    Route::resource('/ppsendiri', 'PProduksisendiriController');
    Route::resource('/pengeluaran', 'PengeluaranController');
    Route::resource('/bukubesar', 'BukubesarController');
    Route::resource('/akun', 'AkunController');
    Route::get('/akun/hapus/{kode}', 'AkunController@destroy');

    // Manajemen Berita (Admin)
    Route::get('/berita', 'BeritaController@index')->name('berita');
    Route::get('/berita/index', 'BeritaController@index')->name('berita.index');
    Route::get('/berita/create', 'BeritaController@create')->name('berita.create');
    Route::get('/berita/edit', 'BeritaController@edit')->name('berita.edit');
    Route::post('/berita/update', 'BeritaController@update')->name('berita.update');
    Route::post('/berita/store', 'BeritaController@store')->name('berita.store');
    Route::delete('/berita/{news:slug}/delete', 'BeritaController@destroy')->name('berita.destroy');
    Route::get('/berita/{news:slug}', 'BeritaController@show')->name('berita.show');

    // Khusus Admin & Pemilik
    Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/user/hapus/{kode}', 'UserController@destroy');

        // Laporan
        Route::get('/laporan/index', 'LaporanController@index');
        Route::get('/laporan/show', 'LaporanController@show');
        Route::get('/laporan/pengeluaran', 'LaporanController@pengeluaran');

        // Kelola Pesanan Online Pelanggan
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/pesanan', 'Admin\PesananAdminController@index')->name('pesanan.index');
            Route::get('/pesanan/{id}', 'Admin\PesananAdminController@show')->name('pesanan.show');
            Route::put('/pesanan/{id}/status', 'Admin\PesananAdminController@updateStatus')->name('pesanan.updateStatus');

            // CMS Settings
            Route::get('/site-settings', 'Admin\SiteSettingController@index')->name('site-settings.index');
            Route::post('/site-settings', 'Admin\SiteSettingController@update')->name('site-settings.update');

            // CMS Hero Slider
            Route::resource('hero-slider', 'Admin\HeroSliderController');

            // CMS Galeri
            Route::resource('galeri', 'Admin\GaleriController');

            // CMS FAQ
            Route::resource('faq', 'Admin\FaqController');
        });
    });
});
