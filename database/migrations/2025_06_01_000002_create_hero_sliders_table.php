<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('gambar');
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_sliders');
    }
}

