<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZHROM0007 extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('ZHROM0007', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no');
            $table->string('AbbrPosition');
            $table->string('AbbrOrgUnitDirektorat');
            $table->string('ObjectIDOrgUnitDirektorat');
            $table->string('NameofOrgUnitDirektorat');
            $table->string('AbbrOrgUnitSubDirektorat');
            $table->string('ObjectIDOrgUnitSubDirektorat'); 
            $table->string('NameofOrgUnitSub Direktorat'); 
            $table->string('AbbrOrgUnitDivisi');
            $table->string('ObjectIDOrgUnitDivisi');
            $table->string('NameofOrgUnitDivisi');
            $table->string('AbbrOrgUnitDinas');
            $table->string('ObjectIDOrgUnitDinas'); 
            $table->string('NameofOrgUnitDinas'); 
            $table->string('AbbrOrgUnitSeksi'); 
            $table->string('ObjectIDOrgUnitSeksi'); 
            $table->string('NameofOrgUnitSeksi'); 
            $table->string('AbbrOrgUnitUrusan'); 
            $table->string('ObjectIDOrgUnitUrusan'); 
            $table->string('NameofOrgUnitUrusan'); 
            $table->string('AbbrPositionID'); 
            $table->string('ObjectIDPosition'); 
            $table->string('NameofPosition'); 
            $table->string('LvlOrg'); 
            $table->string('StaffingStatus'); 
            $table->string('TemporaryPosition'); 
            $table->string('JobAbbrev'); 
            $table->string('JobName'); 
            $table->string('JobID'); 
            $table->string('EmployeeGroup'); 
            $table->string('NameofEmployeeGroup'); 
            $table->string('EmployeeSubGroup'); 
            $table->string('NameofEmployeeSubgroup'); 
            $table->string('PersonnelArea'); 
            $table->string('PersonnelAreaText'); 
            $table->string('PersonnelSubArea'); 
            $table->string('PersonnelSubAreaText'); 
            $table->string('NIK'); 
            $table->string('Nama'); 
            $table->string('NameofPositionID'); 
            $table->string('PEND'); 
            $table->string('PSDR'); 
            $table->string('TMTPOS'); 
            $table->string('TMBTanggalMulaiBekerja'); 
            $table->string('TanggalMulaiGrade'); 
            $table->string('BirthDate'); 
            $table->string('Age'); 
            $table->string('SisaMK'); 
            $table->string('CostCenter'); 
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
    //     Schema::table('ZHROM0007', function (Blueprint $table) {
    //         //
    //     });
    // }
    public function down()
    {
        Schema::dropIfExists('ZHROM0007');
    }
}
