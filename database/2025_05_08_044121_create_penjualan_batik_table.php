<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanBatikTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan_batik', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penjualan');
            $table->string('nama_pelanggan');
            $table->string('nama_produk');
            $table->enum('sumber_produk', ['setengah_jadi', 'produksi_sendiri']);
            $table->unsignedInteger('jumlah_item');
            $table->unsignedInteger('harga_satuan');
            $table->unsignedInteger('total_bayar');
            $table->text('keterangan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_batik');
    }
}
