<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kata_kerja;

class katakerjaController extends Controller
{
    public function index(Request $request)
    {
        $tj = kata_kerja::all();
        
        $data = ['kata_kerja'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_katakerja',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddkatakerja');
    }
    
    public function store(Request $request)
    {
        $level                  = $request->level;
        $keterangan             = $request->keterangan;
        
        $data = new kata_kerja();
        $data->level            = $level;
        $data->keterangan       = $keterangan;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_katakerja')->with('status', 'Berhasil di Simpan');
        }
    }
    public function delete($id)
    {
        kata_kerja::find($id)->delete();
        return redirect('/AdminAnalystOD/list_katakerja')->with('status', 'Berhasil di Delete');
    }

    public function edit(Request $request, $id)
    {
        $item = kata_kerja::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editkatakerja',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = kata_kerja::find($id);

        $flight->level      = $request->level;
        $flight->keterangan = $request->keterangan;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_katakerja')->with('status', 'Berhasil di Update');
    }
}
