<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetengahJadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setengah_jadi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kode_produk')->unique();
            $table->foreignId('motif_id')->constrained('motif')->onDelete('cascade');
            $table->foreignId('jenis_kain_id')->constrained('jenis_kain')->onDelete('cascade');
            $table->foreignId('ukuran_id')->constrained('ukuran')->onDelete('cascade');
            $table->integer('stok')->default(0);
            $table->double('harga', 15, 2)->default(0);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('setengah_jadi');
    }
}

