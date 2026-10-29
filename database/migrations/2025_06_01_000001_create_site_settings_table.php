<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
            $table->enum('type', ['text', 'image', 'json', 'textarea'])->default('text');
            $table->string('label')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}

