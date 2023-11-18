<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembayaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index(){
        $laporanpembayaran = LaporanPembayaran::with(['data_siswa', 'data_tagihan.list_jenis_tagihan', 'data_admin'])->get();
        return view('layouts.laporan_pembayaran', compact('laporanpembayaran'));
    }
}