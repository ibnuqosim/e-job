<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matrikindikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Matrikindikator', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lavel');
            $table->string('unitkerja');
            $table->string('kodeunit');
            $table->string('object');
            $table->string('indikator');
            $table->string('kewenangan');
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
        Schema::dropIfExists('Matrikindikator');
    }
}
