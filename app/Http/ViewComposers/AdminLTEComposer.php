<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\history_pesan;
use App\jobdescreate;
use Illuminate\Support\Facades\Auth; 

class AdminLTEComposer
{

    protected $belumkonfirm;
    protected $belumdilihat;
    protected $validanalis;
    protected $validuser;
    protected $validodhcp;
    protected $tindaklanjut;

    public function __construct()
    {
        $user = Auth::user();
        //dd($user);
        $this->tindaklanjut = jobdescreate::where('konfirmvalidanalis',null)->where('nikuser',$user->userid)->get();
        $this->belumkonfirm = history_pesan::where('nikanalis',$user->userid)->where('status',0)->get();
        $this->belumdilihat = history_pesan::where('nik',$user->userid)->where('dilihat',0)->where('status',1)->get();
        //notif untuk analis
        $wherevalidanalis = array('konfirmvalidanalis'=>1,'nikanalis'=>$user->userid,'approveanalis'=>0);
        $this->validanalis  = jobdescreate::where($wherevalidanalis)->get();
        //notif untuk user
        $wherevaliduser = array('approveuser'=>null,'nikuser'=>$user->userid,'approveanalis'=>1);
        $this->validuser  = jobdescreate::where($wherevaliduser)->get();
        //notif untuk odhcp
        $wherevalidodhcp = array('approveodhcp'=>null,'nikapprove'=>$user->userid,'approveuser'=>1);
        $this->validodhcp  = jobdescreate::where($wherevalidodhcp)->get();

    }

    public function compose(View $view)
    {
        $tindaklanjut = $this->tindaklanjut->count();
        $blmkonfirm = $this->belumkonfirm->count();
        $blmdilihat = $this->belumdilihat->count();
        $validanalis= $this->validanalis->count();
        $validuser= $this->validuser->count();
        $validodhcp= $this->validodhcp->count();
        $notif = $blmkonfirm+$blmdilihat+$validanalis+$validuser+$validodhcp+$tindaklanjut;
        $with = array(
            'tindaklanjut'=>$tindaklanjut,
            'blmkonfirm'=>$blmkonfirm,
            'notif'=>$notif,
            'blmdilihat'=>$blmdilihat,
            'validanalis'=>$validanalis,
            'validuser'=>$validuser,
            'validodhcp'=>$validodhcp);
        //$view->with('blmkonfirm',$blmkonfirm );
      
        $view->with($with);
    }
}