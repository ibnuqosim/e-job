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
        $userid = Auth::user()->roles;
      //   $data = User::where('userid',$userid)->first();
      //   $ret = $data->structdisp->where('no','1');
        // foreach ($data->structdisp as $key => $value) {
        //    var_dump($value->empname);
        // }
        return dd($userid);
   }
}
