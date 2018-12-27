<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\jobdescreate;

class UserListJoblistController extends Controller
{
    public function index(Request $request)
    {
        //----get user name--------
        // Auth::user()->username;
        //-------------------------

        $tj = jobdescreate::all();
        $data = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj];
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.listjobdescreate',$data);
        // return view('UserSuptMgrGM.ListJoblist');
    }
    public function ShowAjax(Request $request)
    {
        $return = [];
        $namauser = Auth::user()->username;
        $job = jobdescreate::where('namauser',$namauser)->get();

        foreach ($job as $key => $value) {
            array_push($return,
                array(
                    'no' => $key+1,
                    'no_jabatan' => $value->subdirektorat,
                    'namauser' => $value->namauser,
                    'analis' => $value->analis,
                )
            );
                
        }
        return array('data'=>$return);
    }
}
