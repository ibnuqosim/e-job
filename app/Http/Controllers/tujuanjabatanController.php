<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tujuan_jabatan;

class tujuanjabatanController extends Controller
{
    public function index(Request $request)
    {
        $tj = tujuan_jabatan::all();

        $data = ['tujuan_jabatan'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_tujuan_jabatan',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddJabatan');
    }
    public function store(Request $request)
    {
        $kata_kerja     = $request->kata_kerja;
        $pilih_object   = $request->pilih_object;
        $pilih_jabatan  = $request->pilih_jabatan;

        $data = new tujuan_jabatan();
        $data->kata_kerja       = $kata_kerja;
        $data->objecy_sistem    = $pilih_object;
        $data->objecy_jabatan   = $pilih_jabatan;
        $data->save();

        if($data){
            return redirect('/AdminAnalystOD/list');
        }
    }
}