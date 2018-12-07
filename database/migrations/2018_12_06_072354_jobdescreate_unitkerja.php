<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobdescreateUnitkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdescreate_unitkerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobdescreate_id');
            $table->string('id_emp_cskt_ltext');
            $table->string('id_hal_internal');
            $table->string('id_eksternal');
            $table->string('id_hal_external');
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
        Schema::dropIfExists('jobdescreate_unitkerja');
    }
}
