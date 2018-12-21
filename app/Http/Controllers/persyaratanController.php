<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\persyaratan_fisik;

class persyaratanController extends Controller
{
    public function index(Request $request)
    {
        $tj = persyaratan_fisik::all();
        
        $data = ['persyaratan'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_persyaratan',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddpersyaratan');
    }
    
    public function store(Request $request)
    {
        $persyaratan     = $request->persyaratan;
        
        $data = new persyaratan_fisik();
        $data->persyaratan   = $persyaratan;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_persyaratan')->with('status', 'Berhasil di Simpan');
        }
    }
    public function delete($id)
    {
        persyaratan_fisik::find($id)->delete();
        return redirect('/AdminAnalystOD/list_persyaratan')->with('status', 'Berhasil di Delete');
    }

    public function edit(Request $request, $id)
    {
        $item = persyaratan_fisik::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editpersyaratan',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = persyaratan_fisik::find($id);

        $flight->persyaratan = $request->persyaratan;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_persyaratan')->with('status', 'Berhasil di Update');
    }
}
