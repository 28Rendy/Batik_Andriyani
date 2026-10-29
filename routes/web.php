<?php

// use App\Http\Controllers\BeritaController;
use App\Http\Controllers\JenisKainController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\PemasukanKasController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\PemkasController;
use App\Http\Controllers\PSetengahJadiController;
use App\Http\Controllers\PProduksisendiriController;
use App\Http\Controllers\PengeluaranController;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProduksiSendiriControllerx;
use App\Http\Controllers\SetengahJadiController;
use App\Http\Middleware\IsAdmin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\WelcomeController;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/hapus/{kode}', 'UserController@destroy');

Route::resource('/akun', 'AkunController');

Route::get('/akun/hapus/{kode}', 'AkunController@destroy');

Route::resource('/kaskeluar', 'KaskeluarController');

Route::get('/kaskeluar/hapus/{id}', 'KaskeluarController@destroy');

Route::resource('/bukubesar', 'BukubesarController');

Route::resource('/kasmasuk', 'KasmasukController');

Route::get('/kasmasuk/hapus/{id}', 'KasmasukController@destroy');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/persediaan', 'PersediaanController');
Route::resource('/Psendiri', 'ProduksiSendiriController');
Route::resource('/Sjadi', 'SetengahJadiController');
Route::resource('/motif', 'MotifController');
Route::resource('/ukuran', 'UkuranController');
Route::resource('/Jkain', 'JenisKainController');
Route::resource('/pemkas', 'PemasukankasController');
Route::resource('/psetengah', 'PSetengahJadiController');
Route::resource('/ppsendiri', 'PProduksisendiriController');
Route::resource('/psetengah', 'PSetengahJadiController');
Route::resource('/pengeluaran', 'PengeluaranController');

Route::get('/api/chart-data', [HomeController::class, 'getChartData']);
Route::get('/api/stok-chart', [HomeController::class, 'getStokChartData']);



// Form input email dan nama ibu
Route::get('/forgot', [ForgotController::class, 'create'])->name('forgot.create');

// Proses validasi email + nama ibu
Route::post('/forgot', [ForgotController::class, 'store'])->name('forgot.store');

// Form input password baru
Route::get('/forgot', [ForgotController::class, 'edit'])->name('forgot.edit');

// Proses simpan password baru
Route::post('/forgot', [ForgotController::class, 'update'])->name('forgot.update');
Route::put('/forgot', [ForgotController::class, 'update'])->name('forgot.update');
Route::get('/forgot', [App\Http\Controllers\ForgotController::class, 'create'])->name('forgot.create');

// Proses verifikasi email dan nama ibu (POST)
Route::post('/forgot', [ForgotController::class, 'store'])->name('forgot.store');

// Tampilkan form reset password (GET)
Route::get('/forgot/reset', [ForgotController::class, 'edit'])->name('forgot.edit');

// Proses reset password (PUT)
Route::put('/forgot/reset', [ForgotController::class, 'update'])->name('forgot.update');


Route::middleware([IsAdmin::class])->group(function () {
    Route::resource('/user', 'UserController');
    // Route::resource('/laporan', 'LaporanController');
    // Route::get('/laporan', [LaporanController::class, 'pengeluaran']);
    Route::get('/laporan/index', [LaporanController::class, 'index']);
    Route::get('/laporan/show', [LaporanController::class, 'show']);
    Route::get('/laporan/pengeluaran', [LaporanController::class, 'pengeluaran']); // Ganti nama route ini

});

// Admin Routes (dengan middleware auth jika diperlukan)


// Route for berita resource
// Route::resource('/berita', BeritaController::class);

// Display list of published news
Route::get('/berita/index', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
Route::get('/berita/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::post('/berita/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
Route::post('/berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::get('/semua-berita', [App\Http\Controllers\BeritaController::class, 'frontend'])->name('semua-berita');
Route::delete('/berita/{news:slug}/delete', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');

// Display a specific news item
Route::get('/berita/{news:slug}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');
