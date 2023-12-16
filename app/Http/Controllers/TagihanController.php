<?php

namespace App\Http\Controllers;

use App\Models\JenisTagihan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $amount = str_replace([',', '.'], '', $request->harga_tagihan);
        $tagihan->update([
            'harga_tagihan' => $amount
        ]);

        return redirect()->route('data-tagihan.index');
    }

    public function destroy(Tagihan $tagihan){
        $tagihan->delete();

        return redirect()->route('data-tagihan.index');
    }
    
    public function export_data_excel(Request $request)
    {
        $data_tagihan = Tagihan::join('Siswa', 'Tagihan.nisn', '=', 'Siswa.nisn')
            ->join('jenis_tagihan', 'Tagihan.id_jenis_tagihan', '=', 'jenis_tagihan.id_jenis_tagihan')
            ->where('Siswa.nama', '=', $request->export_nama_siswa_tagihan)
            ->get();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Data Tagihan Siswa');

            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'ID Tagihan');
            $sheet->setCellValue('C1', 'NISN Siswa');
            $sheet->setCellValue('D1', 'Nama Siswa');
            $sheet->setCellValue('E1', 'Nama Tagihan');
            $sheet->setCellValue('F1', 'Harga Tagihan');
            $sheet->setCellValue('G1', 'Waktu Tagihan');
            $sheet->setCellValue('H1', 'Status Tagihan');
 
            $no_cell = 2;
            $no_data = 1;
            foreach($data_tagihan as $tagihan)
            {
                $sheet->setCellValue('A'. $no_cell, $no_data);
                $sheet->setCellValue('B'. $no_cell, $tagihan->id_tagihan);
                $sheet->setCellValue('C'. $no_cell, $tagihan->nisn);
                $sheet->setCellValue('D'. $no_cell, $tagihan->nama_jenis_tagihan . ' ' . $tagihan->bulan . ' ' . $tagihan->tahun);
                $sheet->setCellValue('E'. $no_cell, 'Rp. ' . number_format($tagihan->harga_tagihan));
                $sheet->setCellValue('F'. $no_cell, $tagihan->jangka_waktu);
                $sheet->setCellValue('G'. $no_cell, $tagihan->status_tagihan);

                $no_cell++;
                $no_data++;
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save('Data Tagihan Siswa.xlsx');

        return redirect()->route('data-tagihan.index');
    }
}
