<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasMasukDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_masuk_det', function (Blueprint $table) {
            $table->unsignedBigInteger('idkm');
            $table->unsignedBigInteger('idakun');
            $table->double('nildb');
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
        Schema::dropIfExists('kas_masuk_det');
    }
}
