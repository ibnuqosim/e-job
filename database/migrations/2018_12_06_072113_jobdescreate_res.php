<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobdescreateRes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdescreate_res', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobdescreate_id');
            $table->string('id_kata_kerja');
            $table->string('id_met_object');
            $table->string('id_met_indikator');
            $table->string('id_met_kewenangan');
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
        Schema::dropIfExists('jobdescreate_res');
    }
}
