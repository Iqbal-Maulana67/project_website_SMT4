<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;
    protected $table = "admin";
    protected $primaryKey = "username";
    protected $fillable = ["username", "nama_admin", "password"];

    public $incrementing = false;
    protected $keyType = 'string';

    public function data_laporan(){
        $this->hasMany(LaporanPembayaran::class);
    }
}
