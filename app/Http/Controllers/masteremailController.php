<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masteremail;

class masteremailController extends Controller
{   
    public function index(Request $request)
    {
        $tj = masteremail::all();
        
        $data = ['masteremail'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.pengaturan.listmasteremail',$data);
    }

    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.pengaturan.formmasteremail');
    }

    public function store(Request $request)
    {
        $deskripsiemail     = $request->deskripsiemail;
        
        $data = new masteremail();
        $data->deskripsiemail   = $deskripsiemail;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/listmasteremail');
        }
    }
}
