<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZHROM0013 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZHROM0013', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nojabatan');
            $table->string('namajabatan');
            $table->string('nojabatanatasanlangsung');
            $table->string('jabatanatasanlangsung');
            $table->string('nojabatanbawahanlangsung');
            $table->string('abatanbawahanlangsung');
            $table->string('jumlah');
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
        Schema::dropIfExists('ZHROM0013');
    }
}
