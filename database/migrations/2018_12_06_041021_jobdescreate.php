<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jobdescreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jobdescreate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_jabatan');
            $table->string('name_jabatan');
            $table->string('gol_jabatan');
            $table->string('dinas');
            $table->string('divisi');
            $table->string('subdirektorat');
            $table->string('direktorat');
            $table->string('directly');
            $table->string('jobrole');
            $table->string('finansial');
            $table->string('nonfinansial');
            $table->string('persyaratan_fisik');
            $table->string('gambar');
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
        Schema::dropIfExists('Jobdescreate');
    }
}
