<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->enum('sumber_produk', ['produksi_sendiri', 'setengah_jadi'])->nullable();
            $table->string('nama_produk');
            $table->integer('jumlah');
            $table->double('harga_satuan', 15, 2)->default(0);
            $table->double('total', 15, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->enum('status_pesanan', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->enum('status_pengiriman', ['menunggu', 'dikirim', 'diterima'])->default('menunggu');
            $table->string('alamat_pengiriman')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}

