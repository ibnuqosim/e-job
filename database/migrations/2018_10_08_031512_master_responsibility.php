<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterResponsibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MasterResponsibility', function (Blueprint $table) {
        // Schema::table('MasterResponsibility', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no');
            $table->string('direktur');
            $table->string('generalmanager');
            $table->string('manager');
            $table->string('superintendent');
            $table->string('supervisor');
            $table->string('foreman');
            $table->string('operator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::table('MasterResponsibility', function (Blueprint $table) {
    //         //
    //     });
    // }
    public function down()
    {
        Schema::dropIfExists('MasterResponsibility');
    }
}
