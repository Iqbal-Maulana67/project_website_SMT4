<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn')->primary();
            $table->string('nis');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('no_hp');
            $table->string('alamat');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->enum('status_siswa', ['aktif', 'tidak_aktif']);
            $table->enum('status_pondok', ['pondok', 'normal']);
            $table->enum('status_alumni', ['alumni', 'baru']);
            $table->string('no_va');
            $table->string('password');
            $table->year('tahun_angkatan');
            $table->string('gambar_siswa');
            $table->timestamps();
            
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
