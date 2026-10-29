<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersediaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persediaan', function (Blueprint $table) {
            $table->id();
            $table->string('kdps',10);
            $table->string('nmps',50);
            $table->unsignedInteger('qty');
            $table->unsignedInteger('hj');
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
        Schema::dropIfExists('persediaan');
    }
}
