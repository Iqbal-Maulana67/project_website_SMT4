<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\ValidasiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ValidasiController extends Controller
{
    public function index(){
        $validasi = ValidasiPembayaran::with(['list_siswa', 'list_tagihan.list_jenis_tagihan'])->get();
        return view('layouts.validasi_pembayaran', compact('validasi'));
    }

    public function validasi_pembayaran(Request $request){
        $tagihan = Tagihan::where('id_tagihan', '=', $request->id_tagihan)->first();
        $path = public_path('img/img_validasi');
        
        $tagihan->update([
            'status_tagihan' => 'LUNAS'
        ]);
        $validasi = ValidasiPembayaran::where('id_tagihan', '=', $request->id_tagihan)->first();

        File::delete($path . '/' . $validasi->gambar_pembayaran);

        ValidasiPembayaran::where('id_tagihan', '=', $request->id_tagihan)->delete();

        return redirect()->route('validasi-pembayaran.index');
    }

    public function tolak_pembayaran(Request $request){
        $path = public_path('img/img_validasi');
        $validasi = ValidasiPembayaran::where('id_tagihan', '=', $request->id_tagihan)->first();

        File::delete($path . '/' . $validasi->gambar_pembayaran);

        ValidasiPembayaran::where('id_tagihan', '=', $request->id_tagihan)->delete();

        return redirect()->route('validasi-pembayaran.index');
    }

}
