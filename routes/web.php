<?php

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

Route::get('/', function () {
    return view('layouts.index');
})->name('dashboard');

Route::get('/transaksi', function () {
    return view('layouts.transaksi');
})->name('transaksi');

Route::get('/laporan', function () {
    return view('layouts.laporan');
})->name('laporan');

Route::get('/detail_transaksi', function () {
    return view('layouts.detail_transaksi');
})->name('detail_transaksi');

Route::get('/data_siswa', function () {
    return view('layouts.data_siswa');
})->name('data-siswa');

Route::get('/tambah_siswa', function(){
    return view('layouts.tambah_siswa_page');
});

Route::get('/data-tagihan', function () {
    return view('layouts.data_tagihan');
})->name('data-tagihan');

Route::get('/data-jenis-tagihan', function () {
    return view('layouts.data_jenis_tagihan');
})->name('data-jenis-tagihan');

Route::get('/data-kelas', function () {
    return view('layouts.data_kelas');
})->name('data-kelas');

Route::get('/laporan-pembayaran', function () {
    return view('layouts.laporan_pembayaran');
})->name('laporan-pembayaran');

Route::get('/atur-tagihan', function() {
    return view('layouts.atur_tagihan');
})->name('atur-tagihan');

Route::get('/dashboard', function() {
    return view('dashboard');
}); 

Route::get('/validasi-pembayaran', function(){
    return view('layouts.validasi_pembayaran');
})->name('validasi-pembayaran');

Route::get('/data-admin', function(){
    return view('layouts.data_admin');
})->name('data-admin');