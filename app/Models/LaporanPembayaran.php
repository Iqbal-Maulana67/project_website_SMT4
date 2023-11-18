<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPembayaran extends Model
{
    use HasFactory;
    protected $table = "laporan_pembayaran";
    protected $fillable = ["nisn", "id_tagihan", "username", "tanggal_pembayaran"];

    public function data_siswa(){
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function data_tagihan(){
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }

    public function data_admin(){
        return $this->belongsTo(Admin::class, 'username', 'username');
    }

}
