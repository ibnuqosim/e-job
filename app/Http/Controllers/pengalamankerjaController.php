<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengalaman_kerja;

class pengalamankerjaController extends Controller
{
    public function index(Request $request)
    {
        $tj = pengalaman_kerja::all();
        
        $data = ['pengalaman_kerja'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_pengalamankerja',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddpengalamankerja');
    }
    
    public function store(Request $request)
    {
        $keterangan     = $request->keterangan;
        
        $data = new pengalaman_kerja();
        $data->keterangan   = $keterangan;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_pengalamankerja');
        }
    }
    public function delete($id)
    {
        pengalaman_kerja::find($id)->delete();
        return redirect('/AdminAnalystOD/list_pengalamankerja');
    }

    public function edit(Request $request, $id)
    {
        $item = pengalaman_kerja::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editpengalamankerja',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = pengalaman_kerja::find($id);

        $flight->keterangan = $request->keterangan;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_pengalamankerja');
    }
}
