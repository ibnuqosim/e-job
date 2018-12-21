<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\lingkungan_kerja;

class lingkungankerjaController extends Controller
{
    public function index(Request $request)
    {
        $tj = lingkungan_kerja::all();
        
        $data = ['lingkungankerja'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_lingkungankerja',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddlingkungankerja');
    }
    
    public function store(Request $request)
    {
        $deskripsi     = $request->deskripsi;
        
        $data = new lingkungan_kerja();
        $data->deskripsi   = $deskripsi;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_lingkungankerja')->with('status', 'Berhasil di Simpan');
        }
    }
    public function delete($id)
    {
        lingkungan_kerja::find($id)->delete();
        return redirect('/AdminAnalystOD/list_lingkungankerja')->with('status', 'Berhasil di Delete');
    }

    public function edit(Request $request, $id)
    {
        $item = lingkungan_kerja::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editlingkungankerja',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $flight = lingkungan_kerja::find($id);

        $flight->deskripsi = $request->deskripsi;
        
        $flight->save();
        return redirect('/AdminAnalystOD/list_lingkungankerja')->with('status', 'Berhasil di Update');
    }
}
