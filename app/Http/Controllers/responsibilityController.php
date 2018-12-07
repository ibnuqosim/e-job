<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\responsibility;

class responsibilityController extends Controller
{
    public function index(Request $request)
    {
        $tj = responsibility::all();

        $data = ['responsibility'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.listresponsibility',$data);
    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddResponsibility');
    }

    public function store(Request $request)
    {
        $kata_kerja             = $request->kata_kerja;
        $object_by_system       = $request->object_by_system;
        $indikator_by_system    = $request->indikator_by_system;

        $data = new responsibility();
        $data->kata_kerja            = $kata_kerja;
        $data->object_by_system      = $object_by_system;
        $data->indikator_by_system   = $indikator_by_system;
        $data->save();

        if($data){
            return redirect('/AdminAnalystOD/list_responsibility');
        }
    }
}
