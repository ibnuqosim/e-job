<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\authorities;

class authoritiesController extends Controller
{
    public function index(Request $request)
    {
        $tj = authorities::all();
        
        $data = ['authorities'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.listauthorities',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAdddauthorities');
    }
    
    public function store(Request $request)
    {
        $deskripsi     = $request->deskripsi;
        
        $data = new authorities();
        $data->deskripsi   = $deskripsi;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_authorities');
        }
    }
}
