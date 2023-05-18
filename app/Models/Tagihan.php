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
}
