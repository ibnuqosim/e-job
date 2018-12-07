<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bahan_kerja;

class bahankerjaController extends Controller
{
    public function index(Request $request)
    {
        $tj = bahan_kerja::all();
        
        $data = ['bahan_kerja'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_bahankerja',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddbahankerja');
    }
    
    public function store(Request $request)
    {
        $deskripsi     = $request->deskripsi;
        
        $data = new bahan_kerja();
        $data->deskripsi   = $deskripsi;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_bahankerja');
        }
    }
    public function delete($id)
    {
        bahan_kerja::find($id)->delete();
        return redirect('/AdminAnalystOD/list_bahankerja');
    }

    public function edit(Request $request, $id)
    {
        $item = bahan_kerja::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editbahankerja',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = bahan_kerja::find($id);

        $flight->deskripsi = $request->deskripsi;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_bahankerja');
    }
    
}
