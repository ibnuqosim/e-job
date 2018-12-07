<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responsibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Responsibility', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no');
            $table->string('nik');
            $table->string('nama');
            $table->string('tugas_tangungjawab');
            $table->string('indikator_capaian');
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
        Schema::dropIfExists('Responsibility');
    }
}
