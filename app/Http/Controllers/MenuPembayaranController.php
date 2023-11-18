<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembayaran;
use App\Models\Siswa;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuPembayaranController extends Controller
{
    public function index(){
        return view('layouts.transaksi');
    }

    public function search_data(Request $request){
        $siswa = Siswa::where('nisn', '=', $request->nisn)->with('data_kelas')->get();

        return view('layouts.transaksi', compact('siswa'));
    }

    public function view_page($nisn){
        $siswa = Siswa::with(['data_kelas', 'data_tagihan.list_jenis_tagihan', 'data_pembayaran.data_tagihan.list_jenis_tagihan'])->where('nisn', '=', $nisn)->first();
        
        return view('layouts.detail_transaksi', compact('siswa'));
    }

    public function tagihan_bayar(Request $request){
        
        foreach($request->tableData as $item){
            $tagihan = Tagihan::where('id_tagihan', '=', $item[0])->first();
            $date = Carbon::now();
            $tagihan->update([
                'status_tagihan' => "LUNAS"
            ]);
            LaporanPembayaran::create([
                'nisn' => $request->nisn,
                'id_tagihan' => $tagihan->id_tagihan,
                'username' => Auth::guard('admin')->user()->username,
                'tanggal_pembayaran' => $date->format('Y-m-d')
            ]);
        }
    }
} 
