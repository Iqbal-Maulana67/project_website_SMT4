<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ValidasiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiValidasiController extends Controller
{
    public function sendValidation(Request $request){
        $this->validate($request, [
            'nisn' => 'required',
            'id_tagihan' => 'required',
            'gambar_pembayaran' => 'required',
        ]);

        $file = $request->file('gambar_pembayaran');
        $path = public_path('img/img_validasi');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $fileName = "img_validasi_" . uniqid() . ' ' . $file->getClientOriginalExtension();

        if($file->move($path, $fileName)){
            ValidasiPembayaran::create([
                'nisn' => $request->nisn,
                'id_tagihan' => $request->id_tagihan,
                'gambar_pembayaran' => $fileName
            ]);

            return response()->json([
                'code' => '200',
                'status' => 'OK',
                'message' => 'Permintaan dibuat! Silahkan tunggu beberapa hari'
            ]);
        }
    }
}
