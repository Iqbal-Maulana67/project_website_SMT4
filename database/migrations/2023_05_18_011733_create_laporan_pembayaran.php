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
        Schema::create('laporan_pembayaran', function (Blueprint $table) {
            $table->string('nisn');
            $table->unsignedBigInteger('id_tagihan');
            $table->string('username')->nullable();
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('no action');
            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->onDelete('no action');
            $table->foreign('username')->references('username')->on('admin')->onDelete('set null');
            $table->date('tanggal_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_pembayaran');
    }
};
