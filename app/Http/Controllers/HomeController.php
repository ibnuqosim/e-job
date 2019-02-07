<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\history_pesan;
use App\jobdescreate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $waitforuser;
    protected $waitformanodhcp;
    protected $selesai;
    protected $kadal;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$role = Auth::user()->hasRole();
       // $admin = new Role();
        //print_r($admin);
        $user = Auth::user();
        $roles = Auth::user()->roles[0]->name;
        //dd($roles);
        //dashboard
        // status 1
        if($roles=='AdminAnalystOD'){
            $whereanalstat_1=array('nikanalis'=>$user->userid,'posisiprogress'=>1);
            $this->waitforuser = jobdescreate::where($whereanalstat_1)->get();
        }
        if($roles=='UserSuptMgrGM'){
            $whereanalstat_1=array('nikuser'=>$user->userid,'posisiprogress'=>1);
            $this->waitforuser = jobdescreate::where($whereanalstat_1)->get();
        }
        if($roles=='ManagerOD'){
            $whereanalstat_1=array('nikapprove'=>$user->userid,'posisiprogress'=>1);
            $this->waitforuser = jobdescreate::where($whereanalstat_1)->get();
        }
        
        //status 2
        if($roles=='AdminAnalystOD'){
            $whereanalstat_2=array('nikanalis'=>$user->userid,'posisiprogress'=>2);
            $this->waitformanodhcp = jobdescreate::where($whereanalstat_2)->get();
        }
        if($roles=='UserSuptMgrGM'){
            $whereanalstat_2=array('nikuser'=>$user->userid,'posisiprogress'=>2);
            $this->waitformanodhcp = jobdescreate::where($whereanalstat_2)->get();
        }
        if($roles=='ManagerOD'){
            $whereanalstat_2=array('nikapprove'=>$user->userid,'posisiprogress'=>2);
            $this->waitformanodhcp = jobdescreate::where($whereanalstat_2)->get();
        }
        
        //status 3
        if($roles=='AdminAnalystOD'){
            $whereanalstat_3=array('nikanalis'=>$user->userid,'posisiprogress'=>3);
            $this->selesai = jobdescreate::where($whereanalstat_3)->get();
        }
        if($roles=='UserSuptMgrGM'){
            $whereanalstat_3=array('nikuser'=>$user->userid,'posisiprogress'=>3);
            $this->selesai = jobdescreate::where($whereanalstat_3)->get();
        }
        if($roles=='ManagerOD'){
            $whereanalstat_3=array('nikapprove'=>$user->userid,'posisiprogress'=>3);
            $this->selesai = jobdescreate::where($whereanalstat_3)->get();
        }
        //status 4
        if($roles=='AdminAnalystOD'){
            $whereanalstat_4=array('nikanalis'=>$user->userid,'posisiprogress'=>4);
            $this->kadal = jobdescreate::where($whereanalstat_4)->get();
        }
        if($roles=='UserSuptMgrGM'){
            $whereanalstat_4=array('nikuser'=>$user->userid,'posisiprogress'=>4);
            $this->kadal = jobdescreate::where($whereanalstat_4)->get();
        }
        if($roles=='ManagerOD'){
            $whereanalstat_4=array('nikapprove'=>$user->userid,'posisiprogress'=>4);
            $this->kadal = jobdescreate::where($whereanalstat_4)->get();
        }
        //dashboard
        $menungguuser = $this->waitforuser->count();
        $menungodhcp = $this->waitformanodhcp->count();
        $finish = $this->selesai->count();
        $kadalu =$this->kadal->count();

        $koreksi = history_pesan::where('nikanalis',Auth::user()->userid)
        ->where('status',0)
        ->count();
        $data=['koreksi'=>$koreksi,'menungguuser'=>$menungguuser,
        'menungodhcp'=>$menungodhcp,'finish'=>$finish,'kadalu'=>$kadalu];
        return view('layouts.profil',$data);
    }
}
