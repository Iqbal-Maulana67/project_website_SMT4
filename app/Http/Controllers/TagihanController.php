<?php

namespace App\Http\Controllers;

use App\Models\JenisTagihan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index(){
        $tagihan = Tagihan::with(['list_siswa', 'list_jenis_tagihan'])->get();
        
        return view('layouts.data_tagihan', compact('tagihan'));
    }

    public function create(){
        $jenis_tagihan = JenisTagihan::get();
        
        $tahun_angkatan = Siswa::distinct()->orderBy('tahun_angkatan', 'desc')->pluck('tahun_angkatan');


        return view('layouts.atur_tagihan', compact('jenis_tagihan', 'tahun_angkatan'));
    }

    public function store_siswa(Request $request){
        $jenis_tagihan = JenisTagihan::where('id_jenis_tagihan', '=', $request->jangka_waktu)->get()->first();

        if($jenis_tagihan->jangka_waktu == 'bulanan'){
            $data_bulan = $request->bulan_tagihan;
            foreach($data_bulan as $data){
                Tagihan::create([
                    'nisn' => $request->nisn,
                    'id_jenis_tagihan' => $request->jangka_waktu,
                    'harga_tagihan' => $request->harga_tagihan_bulanan,
                    'bulan' => $data,
                    'tahun' => $request->tahun_tagihan,
                    'status_tagihan' => 'BELUM BAYAR'
                ]);
            }
        }else if ($jenis_tagihan->jangka_waktu == 'bebas'){
            Tagihan::create([
                'nisn' => $request->nisn,
                'id_jenis_tagihan' => $request->jangka_waktu,
                'harga_tagihan' => $request->harga_tagihan_bebas,
                'status_tagihan' => 'BELUM BAYAR'
            ]);
        }

        return redirect()->route('data-tagihan.index');
    }
    public function store_pondok(Request $request){
        $data_siswa = Siswa::where('status_pondok', '=', $request->status_pondok)->get();
        $jenis_tagihan = JenisTagihan::where('id_jenis_tagihan', '=', $request->jangka_waktu)->get()->first();

        if($jenis_tagihan->jangka_waktu == 'bulanan'){
            $data_bulan = $request->bulan_tagihan;
            foreach($data_siswa as $data_siswa){
                foreach($data_bulan as $data){
                    Tagihan::create([
                        'nisn' => $data_siswa->nisn,
                        'id_jenis_tagihan' => $request->jangka_waktu,
                        'harga_tagihan' => $request->harga_tagihan_bulanan,
                        'bulan' => $data,
                        'tahun' => $request->tahun_tagihan,
                        'status_tagihan' => 'BELUM BAYAR'
                    ]);
                }
            }
            
        }else if ($jenis_tagihan->jangka_waktu == 'bebas'){
            foreach($data_siswa as $data_siswa){
                Tagihan::create([
                    'nisn' => $data_siswa->nisn,
                    'id_jenis_tagihan' => $request->jangka_waktu,
                    'harga_tagihan' => $request->harga_tagihan_bebas,
                    'status_tagihan' => 'BELUM BAYAR'
                ]);
            }
        }

        return redirect()->route('data-tagihan.index');
    }

    public function store_angkatan(Request $request){
        $data_siswa = Siswa::where('tahun_angkatan', '=', $request->tahun_angkatan)->get();
        $jenis_tagihan = JenisTagihan::where('id_jenis_tagihan', '=', $request->jangka_waktu)->get()->first();

        if($jenis_tagihan->jangka_waktu == 'bulanan'){
            $data_bulan = $request->bulan_tagihan;
            foreach($data_siswa as $data_siswa){
                foreach($data_bulan as $data){
                    Tagihan::create([
                        'nisn' => $data_siswa->nisn,
                        'id_jenis_tagihan' => $request->jangka_waktu,
                        'harga_tagihan' => $request->harga_tagihan_bulanan,
                        'bulan' => $data,
                        'tahun' => $request->tahun_tagihan,
                        'status_tagihan' => 'BELUM BAYAR'
                    ]);
                }
            }
            
        }else if ($jenis_tagihan->jangka_waktu == 'bebas'){
            foreach($data_siswa as $data_siswa){
                Tagihan::create([
                    'nisn' => $data_siswa->nisn,
                    'id_jenis_tagihan' => $request->jangka_waktu,
                    'harga_tagihan' => $request->harga_tagihan_bebas,
                    'status_tagihan' => 'BELUM BAYAR'
                ]);
            }
        }

        return redirect()->route('data-tagihan.index');
    }

    public function update(Tagihan $tagihan, Request $request){
        $tagihan->update([
            'harga_tagihan' => $request->harga_tagihan
        ]);

        return redirect()->route('data-tagihan.index');
    }

    public function destroy(Tagihan $tagihan){
        $tagihan->delete();

        return redirect()->route('data-tagihan.index');
    }
}
