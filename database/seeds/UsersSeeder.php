<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // Membuat role admin
        $AdminAnalystOD_role = new Role();
        $AdminAnalystOD_role->name = "AdminAnalystOD";
        $AdminAnalystOD_role->display_name = "AdminAnalystOD";
        $AdminAnalystOD_role->save();
        
        // Membuat role Manager OD
        $ManagerOD_role = new Role();
        $ManagerOD_role->name = "ManagerOD";
        $ManagerOD_role->display_name = "ManagerOD";
        $ManagerOD_role->save();
        
        //Membuat role Manager UserSuptMgrGM
        $UserSuptMgrGM_role = new Role();
        $UserSuptMgrGM_role->name = "UserSuptMgrGM";
        $UserSuptMgrGM_role->display_name = "UserSuptMgrGM";
        $UserSuptMgrGM_role->save();
        
        ////Membuat role Manager Specialist HCD
        $SpecialistHCD_role = new Role();
        $SpecialistHCD_role->name = "SpecialistHCD";
        $SpecialistHCD_role->display_name = "SpecialistHCD";
        $SpecialistHCD_role->save();
        
        ////Membuat role Internal Auditor
        $InternalAuditor_role = new Role();
        $InternalAuditor_role->name = "InternalAuditor";
        $InternalAuditor_role->display_name = "InternalAuditor";
        $InternalAuditor_role->save();
        
        ////Membuat role Administrator SMKS
        $AdministratorSMKS_role = new Role();
        $AdministratorSMKS_role->name = "AdministratorSMKS";
        $AdministratorSMKS_role->display_name = "AdministratorSMKS";
        $AdministratorSMKS_role->save();
        
        // Batasan  Membuat sample admin
        $AdminAnalystOD = new User();
        $AdminAnalystOD->name = 'Admin Analys tOD';
        $AdminAnalystOD->email = 'AdminAnalystOD@gmail.com';
        $AdminAnalystOD->password = bcrypt('rahasia');
        $AdminAnalystOD->save();
        $AdminAnalystOD->attachRole($AdminAnalystOD_role);
        // Membuat sample member
        $ManagerOD = new User();
        $ManagerOD->name = "Manager OD";
        $ManagerOD->email = 'ManagerOD@gmail.com';
        $ManagerOD->password = bcrypt('rahasia');
        $ManagerOD->save();
        $ManagerOD->attachRole($ManagerOD_role);

        $UserSuptMgrGM = new User();
        $UserSuptMgrGM->name = "User Sup tMgr GM";
        $UserSuptMgrGM->email = 'UserSuptMgrGM@gmail.com';
        $UserSuptMgrGM->password = bcrypt('rahasia');
        $UserSuptMgrGM->save();
        $UserSuptMgrGM->attachRole($UserSuptMgrGM_role);

        $SpecialistHCD = new User();
        $SpecialistHCD->name = "Specialist HCD";
        $SpecialistHCD->email = 'SpecialistHCD@gmail.com';
        $SpecialistHCD->password = bcrypt('rahasia');
        $SpecialistHCD->save();
        $SpecialistHCD->attachRole($SpecialistHCD_role);

        $InternalAuditor = new User();
        $InternalAuditor->name = "InternalAuditor";
        $InternalAuditor->email = 'InternalAuditor@gmail.com';
        $InternalAuditor->password = bcrypt('rahasia');
        $InternalAuditor->save();
        $InternalAuditor->attachRole($InternalAuditor_role);

        $AdministratorSMKS = new User();
        $AdministratorSMKS->name = "AdministratorSMKS";
        $AdministratorSMKS->email = 'AdministratorSMKS@gmail.com';
        $AdministratorSMKS->password = bcrypt('rahasia');
        $AdministratorSMKS->save();
        $AdministratorSMKS->attachRole($AdministratorSMKS_role);
    }
}
