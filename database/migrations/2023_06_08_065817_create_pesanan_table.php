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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('makanan_id');
            $table->date('tanggal');
            //$table->string('nama');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->timestamps();
            $table->string('status');

            $table->foreign('makanan_id')->references('id')->on('makanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};
