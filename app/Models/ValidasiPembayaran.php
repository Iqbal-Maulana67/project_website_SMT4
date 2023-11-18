<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiPembayaran extends Model
{
    use HasFactory;
    protected $table = "validasi_pembayaran";
    protected $fillable = ["nisn", "id_tagihan", "gambar_pembayaran"];

    public function list_siswa(){
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function list_tagihan(){
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }
}
