<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuPembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\ValidasiController;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;

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

// Data Siswa Routes
Route::resource('/data-siswa', SiswaController::class)->middleware('admin.auth');
Route::post('/data-siswa/hapus/{siswa}', [SiswaController::class, 'destroy'])->name('data-siswa.hapus')->middleware('admin.auth');

//Data Tagihan Routes
Route::get('/data-tagihan', [TagihanController::class, 'index'])->name('data-tagihan.index')->middleware('admin.auth');
Route::get('/data-tagihan/tambah', [TagihanController::class, 'create'])->name('data-tagihan.create')->middleware('admin.auth');
Route::post('/data-tagihan/tambah/siswa', [TagihanController::class, 'store_siswa'])->name('data-tagihan.store_siswa')->middleware('admin.auth');
Route::post('/data-tagihan/tambah/status', [TagihanController::class, 'store_pondok'])->name('data-tagihan.store_status')->middleware('admin.auth');
Route::post('/data-tagihan/tambah/angkatan', [TagihanController::class, 'store_angkatan'])->name('data-tagihan.store_angkatan')->middleware('admin.auth');
Route::post('/data-tagihan/ubah/{tagihan}', [TagihanController::class, 'update'])->name('data-tagihan.update')->middleware('admin.auth');
Route::post('/data-tagihan/hapus/{tagihan}', [TagihanController::class, 'destroy'])->name('data-tagihan.destroy')->middleware('admin.auth');
Route::post('/data-tagihan/export/', [TagihanController::class, 'export_data_excel'])->name('data-tagihan.export')->middleware('admin.auth');

// Menu Pembayaran Routes
Route::get('menu-pembayaran', [MenuPembayaranController::class, 'index'])->name('menu-pembayaran.index')->middleware('admin.auth');
Route::post('menu-pembayaran/search', [MenuPembayaranController::class, 'search_data'])->name('menu-pembayaran.search_data')->middleware('admin.auth');
Route::get('menu-pembayaran/detail/{nisn}', [MenuPembayaranController::class, 'view_page'])->name('menu-pembayaran.detail')->middleware('admin.auth');
Route::post('menu-pembayaran/bayar', [MenuPembayaranController::class, 'tagihan_bayar'])->middleware('admin.auth')->middleware('admin.auth');

// Login Routes

Route::get('login', [AdminAuthController::class, 'index'])->name('login');
Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('admin.auth');

// Validasi Routes

Route::get('validasi-pembayaran', [ValidasiController::class, 'index'])->name('validasi-pembayaran.index')->middleware('admin.auth');
Route::post('validasi-pembayaran/valid', [ValidasiController::class, 'validasi_pembayaran'])->name('validasi-pembayaran.valid')->middleware('admin.auth');
Route::post('validasi-pembayaran/denied', [ValidasiController::class, 'tolak_pembayaran'])->name('validasi-pembayaran.denied')->middleware('admin.auth');

// Jenis Tagihan Routes

Route::resource('/data-jenis-tagihan', JenisController::class)->middleware('admin.auth');
Route::post('/data-jenis-tagihan/delete/{id}', [JenisController::class, 'destroy_data'])->name('data-jenis_tagihan.destroy-data')->middleware('admin.auth');
Route::post('/data-jenis-tagihan/edit/{id}', [JenisController::class, 'update_data'])->name('data-jenis_tagihan.update-data')->middleware('admin.auth');

// Admin Routes
Route::resource('/data-admin', AdminController::class)->middleware('admin.auth');
Route::post('/data-admin/delete/{id}', [AdminController::class, 'destroy_data'])->name('data-admin.destroy-data');
Route::post('/data-admin/edit/{id}', [AdminController::class, 'update_data'])->name('data-admin.update-data');

// Dashboard Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin.auth');

// Data Kelas Routes
Route::post('/data-kelas/delete/{id}', [KelasController::class, 'destroy_data'])->name('data-kelas.destroy-data')->middleware('admin.auth');
Route::post('/data-kelas/edit/{id}', [KelasController::class, 'update_data'])->name('data-kelas.update-data')->middleware('admin.auth');
Route::resource('/data-kelas', KelasController::class)->middleware('admin.auth');

// Data Laporan Routes
Route::resource('/data-laporan', LaporanController::class)->middleware('admin.auth');
