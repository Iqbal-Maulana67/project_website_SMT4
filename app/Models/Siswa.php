<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $primaryKey = "nisn";
    protected $fillable = [
        "nisn",
        "nis",
        "nama",
        "jenis_kelamin",
        "no_hp",
        "alamat",
        "id_kelas",
        "status_siswa",
        "status_pondok",
        "status_alumni",
        "no_va",
        "password",
        "tahun_angkatan",
        "gambar_siswa"
    ];
}
