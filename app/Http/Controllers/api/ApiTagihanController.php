<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class ApiTagihanController extends Controller
{
    public function getAll(){
        $tagihan = Tagihan::get();
        
        return response()->json($tagihan);
    }

    public function getSpecificNISN($nisn){
        $tagihan = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->get();
        $tagihan_total = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->sum('harga_tagihan');

        return response()->json([
            'total' => $tagihan_total,
            'data' => $tagihan
        ]);
    }

    public function getSpecificMonth($nisn, $bulan){
        if ($bulan == "Semua") {
            $tagihan = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->get();
            $tagihan_total = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->sum('harga_tagihan');
            
            return response()->json([
                'total' => $tagihan_total,
                'data' => $tagihan
            ]);
        }else{
            $tagihan = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->where('bulan', '=', $bulan)->get();
            $tagihan_total = Tagihan::with(['list_jenis_tagihan'])->where('nisn', '=', $nisn)->where('status_tagihan', '=', 'BELUM BAYAR')->where('bulan', '=', $bulan)->sum('harga_tagihan');
        
            return response()->json([
                'total' => $tagihan_total,
                'data' => $tagihan
            ]);
        }
    }

    public function getSpecificTagihan($id_tagihan){
        $tagihan = Tagihan::with(['list_jenis_tagihan'])->where('id_tagihan', '=', $id_tagihan)->first();
        $tagihan_total = Tagihan::with(['list_jenis_tagihan'])->where('id_tagihan', '=', $id_tagihan)->where('status_tagihan', '=', 'BELUM BAYAR')->sum('harga_tagihan');
        
        return response()->json([
            'total' => $tagihan_total,
            'data' => $tagihan,
        ]);
    }
}
