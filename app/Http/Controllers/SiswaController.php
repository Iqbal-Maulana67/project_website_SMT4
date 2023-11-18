<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\isEmpty;

class SiswaController extends Controller
{
    public function index(){
        $siswa = Siswa::with('data_kelas')->get();

        return view('layouts.data_siswa', compact('siswa'));
    }

    public function create(){
        $kelas = Kelas::get();
        return view('layouts.form_siswa_page', compact('kelas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required',
            'status_siswa' => 'required',
            'status_pondok' => 'required',
            'status_alumni' => 'required',
            'no_va' => 'required',
            'tahun_angkatan' => 'required',
            'gambar_siswa' => 'required'
        ]);
        
        $path = public_path('img/siswa_image');

        $file = $request->file('gambar_siswa');
        
        $image_name = "siswa_img_". $request->nisn . '.' . $file->getClientOriginalExtension();
        
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true);
        }

        $canvas = Image::canvas(100, 200);

        $resizeImage = Image::make($file)->resize(null, 200, function($constraint){
            $constraint->aspectRatio();
        });

        $canvas->insert($resizeImage, 'center');

        if($canvas->save($path . '/' . $image_name)){
            Siswa::create([
                'nisn' => $request->nisn,
                'nis'  => $request->nis,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_kelas' => $request->id_kelas,
                'status_siswa' => $request->status_siswa,
                'status_pondok' => $request->status_pondok,
                'status_alumni' => $request->status_alumni,
                'no_va' => $request->no_va,
                'password' => bcrypt($request->password),
                'tahun_angkatan' => $request->tahun_angkatan,
                'gambar_siswa' => $image_name
            ]);
        }
        
        return redirect()->route('data-siswa.index');
    }

    public function edit(Siswa $data_siswa){
        $kelas = Kelas::all();
        $siswa = $data_siswa;
        return view('layouts.form_siswa_page', compact('siswa', 'kelas'));
    }

    public function update(Siswa $data_siswa, Request $request){
        $siswa = $data_siswa;
        $path = public_path('img/siswa_image');

        if($request->hasFile('gambar_siswa')){
            $this->validate($request, [
                'nisn' => 'required',
                'nis' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'id_kelas' => 'required',
                'status_siswa' => 'required',
                'status_pondok' => 'required',
                'status_alumni' => 'required',
                'no_va' => 'required',
                'tahun_angkatan' => 'required',
                'gambar_siswa' => 'required'
            ]);

            $file = $request->file('gambar_siswa');

            $canvas = Image::canvas(100, 200);

            $resizeImage = Image::make($file)->resize(null, 200, function($constraint){
                $constraint->aspectRatio();
            });

            $canvas->insert($resizeImage, 'center');

            if($canvas->save($path . '/' . $siswa->gambar_siswa)){
                if(isset($request->password)){
                    $siswa->update([
                        'nisn' => $request->nisn,
                        'nis'  => $request->nis,
                        'nama' => $request->nama,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'no_hp' => $request->no_hp,
                        'alamat' => $request->alamat,
                        'id_kelas' => $request->id_kelas,
                        'status_siswa' => $request->status_siswa,
                        'status_pondok' => $request->status_pondok,
                        'status_alumni' => $request->status_alumni,
                        'no_va' => $request->no_va,
                        'password' => bcrypt($request->password),
                        'tahun_angkatan' => $request->tahun_angkatan,
                        'gambar_siswa' => $siswa->gambar_siswa
                    ]);
                }else{
                    $siswa->update([
                        'nisn' => $request->nisn,
                        'nis'  => $request->nis,
                        'nama' => $request->nama,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'no_hp' => $request->no_hp,
                        'alamat' => $request->alamat,
                        'id_kelas' => $request->id_kelas,
                        'status_siswa' => $request->status_siswa,
                        'status_pondok' => $request->status_pondok,
                        'status_alumni' => $request->status_alumni,
                        'no_va' => $request->no_va,
                        'tahun_angkatan' => $request->tahun_angkatan,
                        'gambar_siswa' => $siswa->gambar_siswa
                    ]);
                }
                
            }

        }else{

            $this->validate($request, [
                'nisn' => 'required',
                'nis' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'id_kelas' => 'required',
                'status_siswa' => 'required',
                'status_pondok' => 'required',
                'status_alumni' => 'required',
                'no_va' => 'required',
                'tahun_angkatan' => 'required',
            ]);

            $siswa->update([
                'nisn' => $request->nisn,
                'nis'  => $request->nis,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_kelas' => $request->id_kelas,
                'status_siswa' => $request->status_siswa,
                'status_pondok' => $request->status_pondok,
                'status_alumni' => $request->status_alumni,
                'no_va' => $request->no_va,
                'password' => bcrypt($request->password),
                'tahun_angkatan' => $request->tahun_angkatan
            ]);
        }

        return redirect()->route('data-siswa.index');
    }

    public function destroy(Siswa $siswa){
        $siswa->delete();

        $path = public_path('img/gambar_tanaman');
        File::delete($path . '/' . $siswa->gambar_siswa);

        return redirect()->route('data-siswa.index');
    }
}
