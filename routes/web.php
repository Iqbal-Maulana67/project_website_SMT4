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