<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\alat_kerja;

class alatkerjaController extends Controller
{
    public function index(Request $request)
    {
        $tj = alat_kerja::all();
        
        $data = ['alat_kerja'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_alatkerja',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddalatkerja');
    }
    
    public function store(Request $request)
    {
        $deskripsi     = $request->deskripsi;
        
        $data = new alat_kerja();
        $data->deskripsi   = $deskripsi;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_alatkerja')->with('status', 'Berhasil di Simpan');
        }
    }
    public function delete($id)
    {
        alat_kerja::find($id)->delete();
        return redirect('/AdminAnalystOD/list_alatkerja')->with('status', 'Berhasil di Delete');
    }

    public function edit(Request $request, $id)
    {
        $item = alat_kerja::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editalatkerja',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = alat_kerja::find($id);

        $flight->deskripsi = $request->deskripsi;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_alatkerja')->with('status', 'Berhasil di Update');
    }
}
