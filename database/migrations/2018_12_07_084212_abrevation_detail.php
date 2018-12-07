<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AbrevationDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abrevation_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abrevation_id');
            $table->string('no');
            $table->string('groupaspek');
            $table->string('namakompetensi');
            $table->string('profisiensi');
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
        Schema::dropIfExists('abrevation_detail');
    }
}
