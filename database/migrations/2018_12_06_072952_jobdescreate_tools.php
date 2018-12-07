<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobdescreateTools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdescreate_tools', function (Blueprint $table) {
            $table->increments('jobdescreate_id');
            $table->string('id_deskripsi');
            $table->string('id_met_object');
            $table->string('id_met_indikator');
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
        Schema::dropIfExists('jobdescreate_tools');
    }
}
