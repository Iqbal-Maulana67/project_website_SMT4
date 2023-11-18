<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembayaran;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\ValidasiPembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $chart1 = Siswa::all();
        $chart2 = Tagihan::all();
        $histori_pembayaran = LaporanPembayaran::with(['data_siswa', 'data_tagihan.list_jenis_tagihan', 'data_admin'])->get();

        // dd($histori_pembayaran->data_admin);
        $total_siswa = Siswa::count();
        $jumlah_pembayaran = Tagihan::count();
        $antrian_validasi = ValidasiPembayaran::count();

        $total_siswa_pondok=Siswa::where('status_pondok', 'pondok')->count();
        $total_siswa_biasa=Siswa::where('status_pondok', 'normal')->count();
        $jumlah_pembayaran_lunas=Tagihan::where('status_tagihan', 'lunas')->count();
        $jumlah_pembayaran_belum_lunas=Tagihan::where('status_tagihan', 'Belum Bayar')->count();
        return view('layouts.index', compact('total_siswa', 'jumlah_pembayaran', 'antrian_validasi', 'total_siswa_pondok', 'total_siswa_biasa','jumlah_pembayaran_lunas', 'jumlah_pembayaran_belum_lunas', 'histori_pembayaran', 'chart1', 'chart2'));
    }
}