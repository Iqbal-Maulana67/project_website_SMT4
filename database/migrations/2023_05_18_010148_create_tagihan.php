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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->bigIncrements('id_tagihan');
            $table->string('nisn');
            $table->foreign('nisn')->references('nisn')
            ->on('siswa')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_tagihan');
            $table->foreign('id_jenis_tagihan')
            ->references('id_jenis_tagihan')
            ->on('jenis_tagihan')
            ->onDelete('cascade');
            
            $table->integer('harga_tagihan');
            $table->string('bulan');
            $table->year('tahun');
            $table->enum('status_tagihan', ['LUNAS', 'BELUM BAYAR']);
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
        Schema::dropIfExists('tagihan');
    }
};
