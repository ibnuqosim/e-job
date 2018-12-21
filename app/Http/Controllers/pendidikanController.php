<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pendidikan;

class pendidikanController extends Controller
{
    public function index(Request $request)
    {
        $tj = pendidikan::all();
        
        $data = ['pendidikan'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_pendidikan',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddpendidikan');
    }
    
    public function store(Request $request)
    {
        $jenjang            = $request->jenjang;
        
        $data = new pendidikan();
        $data->jenjang      = $jenjang;
     
        $data->save();
        
        if($data){
            return redirect('/AdminAnalystOD/list_pendidikan')->with('status', 'Berhasil di Simpan');
        }
    }
    public function delete($id)
    {
        pendidikan::find($id)->delete();
        return redirect('/AdminAnalystOD/list_pendidikan')->with('status', 'Berhasil di Delete');
    }

    public function edit(Request $request, $id)
    {
        $item = pendidikan::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editpendidikan',['item'=>$item]);
    }
    
    public function update(Request $request, $id)
    {
        $flight = pendidikan::find($id);

        $flight->jenjang = $request->jenjang;
        $flight->save();

        return redirect('/AdminAnalystOD/list_pendidikan')->with('status', 'Berhasil di Update');
    }
}

