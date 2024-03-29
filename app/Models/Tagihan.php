<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = "tagihan";
    protected $primaryKey = "id_tagihan";
    protected $fillable = [
        "id_tagihan",
        "nisn",
        "id_jenis_tagihan",
        "harga_tagihan",
        "bulan",
        "tahun",
        "status_tagihan"
    ];

    public function list_siswa(){
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function list_jenis_tagihan(){
        return $this->belongsTo(JenisTagihan::class, 'id_jenis_tagihan');
    }

    public function list_laporan(){
        return $this->hasMany(LaporanPembayaran::class, 'id_tagihan');
    }

    public function list_validasi(){
        return $this->hasMany(ValidasiPembayaran::class, 'id_tagihan');
    }
}
