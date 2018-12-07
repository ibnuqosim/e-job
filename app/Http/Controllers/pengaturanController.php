<?php

namespace App\Http\Controllers;
use App\users;

use Illuminate\Http\Request;

class pengaturanController extends Controller
{
    public function index(Request $request)
    {
        $tj = users::all();
        
        $data = ['users'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.pengaturan.listpengaturan',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.pengaturan.formpengaturan');
    }
    
    public function store(Request $request)
    {
        $deskripsi     = $request->deskripsi;
        
        $data = new authorities();
        $data->deskripsi   = $deskripsi;
        
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/pengaturan/listpengaturan');
        }
    }
}
