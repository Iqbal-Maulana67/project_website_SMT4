<?php

namespace App\Http\Controllers;

use App\Models\JenisTagihan;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(){
        $jenisTagihan = JenisTagihan::get();
        return view('layouts.data_jenis_tagihan', compact('jenisTagihan'));
    }
    public function create(){
        
        return view('layouts.data_jenis_tagihan');
    }

    public function store(Request $request){
        JenisTagihan::create($request->all());

        return redirect()->route('data-jenis-tagihan.index')->with('success', 'Data Jenis Tagihan telah berhasil disimpan.');
    }

   
   public function update_data(Request $request, $id){
    $jenis_tagihan = JenisTagihan::find($id);

    $jenis_tagihan->update([
        'nama_jenis_tagihan' => $request->nama_jenis_tagihan,
        'jangka_waktu' => $request->jangka_waktu
    ]);

    return redirect()->route('data-jenis-tagihan.index')->with('success', 'Data Jenis Tagihan berhasil diperbaharui.');
}

public function destroy_data($id){
    $jenis_tagihan = JenisTagihan::find($id);
    $jenis_tagihan->delete();
    return redirect()->route('data-jenis-tagihan.index')->with('success', 'Data Jenis Tagihan berhasil dihapus');
}
}