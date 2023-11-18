<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiSiswaController extends Controller
{
    public function getAll(){
        $siswa = Siswa::get();
        return response()->json($siswa, 201);
    }

    public function getSpecific($nisn){
        $siswa = Siswa::where('nisn', '=', $nisn)->first();

        return response()->json($siswa, 200);
    }

    public function login(Request $request){
        $siswa = Siswa::where('nisn', '=', $request->nisn)->first();

        if(Hash::check($request->password, $siswa->password)){
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'message' => 'Berhasil Login',
                'data' => $siswa
            ]);
        }else{
            return response()->json([
                'code' => 201,
                'status' => 'Gagal',
                'message' => 'NISN/Password Gagal',
            ]);
        }
    }

    public function changePassword(Request $request){

        $siswa = Siswa::where('nisn', '=', $request->nisn)->first();
        if(Hash::check($request->password, $siswa->password)){
            if($request->password_baru == $request->password_baru_confirm){
                $siswa->update([
                    'password' => bcrypt($request->password_baru)
                ]);
                return response()->json([
                    'code' => '200',
                    'message' => 'Password berhasil diubah'
                ]);
            }else{
                return response()->json([
                    'code' => '201',
                    'message' => 'Password baru dan konfirmasi tidak sama!'
                ]);
            }
        }else{
            return response()->json([
                'code' => '202',
                'message' => 'Password lama tidak sama!'
            ]);
        }

        return response()->json([
            'code' => '203',
            'message' => 'Error'
        ]);
    }
}
