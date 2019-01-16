<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\structdisp;

class debugController extends Controller
{
   public function index(Request $request)
   {
        //$userid = Auth::user()->roles;
        $userid  = Auth::user()->userid;
        $ret = [];
      //   $data = User::where('userid',$userid)->first();
      //   $ret = $data->structdisp->where('no','1');
        // foreach ($data->structdisp as $key => $value) {
        //    var_dump($value->empname);
        // }
        $ret = file_get_contents('http://eos.krakatausteel.com/api/structdisp/'.$userid.'/minManagerBoss');
        $jess=json_decode($ret);
        return dd($jess);
   }
}
