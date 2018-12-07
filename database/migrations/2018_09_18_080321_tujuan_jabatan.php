<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TujuanJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan_jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kata_kerja');
            $table->string('name_jabatan');
            $table->string('nik');
            $table->string('objecy_sistem');
            $table->string('objecy_jabatan');
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
        Schema::dropIfExists('tujuan_jabatan');
    }
}
