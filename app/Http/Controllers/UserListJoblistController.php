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

        return view('UserSuptMgrGM.ListJoblist');
    }
    public function ShowAjax(Request $request)
    {
        $job = jobdescreate::all();
        $return = [];
        foreach ($job as $key => $value) {
            array_push($return,
                array('no_jabatan' => $value->no_jabatan)
            );
                
        }
        return array('data'=>$return);
    }
}
