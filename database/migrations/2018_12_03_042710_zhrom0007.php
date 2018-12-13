<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Zhrom0007 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zhrom0007', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AbbrOrgUnitDirektorat');
            $table->string('NameofOrgUnitDirektorat');
            $table->string('AbbrOrgUnitSubDirektorat');
            $table->string('NameofOrgUnitSubDirektorat');
            $table->string('AbbrOrgUnitDivisi');
            $table->string('NameofOrgUnitDivisi');
            $table->string('AbbrOrgUnitDinas');
            $table->string('NameofOrgUnitDinas');
            $table->string('AbbrOrgUnitSeksi');
            $table->string('NameofOrgUnitSeksi');
            $table->string('AbbrOrgUnitUrusan');
            $table->string('NameofOrgUnitUrusan');
            $table->string('AbbrPosition');
            $table->string('NameofPosition');
            $table->string('LvlOrg');
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
        Schema::dropIfExists('zhrom0007');
    }
