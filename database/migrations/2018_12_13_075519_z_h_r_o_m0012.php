<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZHROM0012 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZHROM0012', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noorg');
            $table->string('unitkerja');
            $table->string('nojabatan');
            $table->string('namajabatan');
            $table->string('gol');
            $table->string('job');
            $table->string('groupaspek');
            $table->string('namakompetensi');
            $table->string('proficiency');
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
        Schema::dropIfExists('ZHROM0012');
    }
}
