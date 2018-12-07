<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Abrevation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abrevation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaposisi');
            $table->string('golongan');
            $table->string('ef');
            $table->string('nojabatan');
            $table->string('abrevationno');
            $table->string('unitkerja');
            $table->string('jobgroup');
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
        Schema::dropIfExists('abrevation');
    }
}
