<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPembayaran extends Model
{
    use HasFactory;
    protected $table = "laporan_pembayaran";
    protected $fillable = ["nisn", "id_tagihan", "username", "tanggal_pembayaran"];
}
