<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTagihan extends Model
{
    use HasFactory;
    protected $table = "jenis_tagihan";
    protected $primaryKey = "id_jenis_tagihan";
    protected $fillable = ["id_jenis_tagihan", "nama_jenis_tagihan", "jangka_waktu"];

}
