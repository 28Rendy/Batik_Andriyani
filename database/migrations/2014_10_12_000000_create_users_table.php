<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('roles');
            $table->string('pemilik')->nullable()->default('STAFF');
            $table->string('address');
            $table->string('phone');
            $table->enum("status", ["ACTIVE", "INACTIVE"])->default('ACTIVE');
            $table->string('nama_ibu');
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
        Schema::dropIfExists('users');
    }
}