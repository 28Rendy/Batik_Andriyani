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
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->string('kode_produk')->nullable();
            $table->string('nama_produk');
            $table->enum('sumber_produk', ['setengah_jadi', 'produksi_sendiri']);
            $table->unsignedInteger('jumlah_item');
            $table->double('harga_satuan', 15, 2);
            $table->double('total_bayar', 15, 2);
            $table->text('keterangan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas'])->default('belum_lunas');
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
