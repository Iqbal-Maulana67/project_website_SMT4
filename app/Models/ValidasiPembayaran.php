<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiPembayaran extends Model
{
    use HasFactory;
    protected $table = "validasi_pembayaran";
    protected $fillable = ["nisn", "id_tagihan", "gambar_pembayaran"];
}
