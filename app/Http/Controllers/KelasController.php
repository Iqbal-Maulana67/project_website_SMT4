<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function index(){
        $kelas = Kelas::get();
        return view('layouts.data_kelas', compact('kelas'));
    }
    public function create(){
        
        return view('layouts.data_kelas');
    }

    public function store(Request $request){
        Kelas::create($request->all());

        return redirect()->route('data-kelas.index')->with('success', 'Data Kelas baru telah berhasil disimpan.');
    }

    

   public function update_data(Request $request, $id ){
        $data_kelas = Kelas::find($id);
        $data_kelas->update([
            'nama_kelas' => $request->nama_kelas
        ]);
        

        return redirect()->route('data-kelas.index')->with('success', 'Data kelas berhasil diperbaharui.');
   }

   public function destroy_data($id){
        $data_kelas = Kelas::find($id);
        $data_kelas->delete();
        return redirect()->route('data-kelas.index')->with('success', 'Data Kelas berhasil dihapus');
   }
}