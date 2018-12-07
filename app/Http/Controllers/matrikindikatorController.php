<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matrikindikator;
// use Illuminate\Support\Facades\DB;

class matrikindikatorController extends Controller
{
public function index(Request $request)
    {
        $tj = matrikindikator::all();

        $data = ['matrikindikator'=>'test','tj'=>$tj];
        return view('pos.AdminAnalystOD.list_matrikindikator',$data);

    }
    public function fromAdd(Request $request)
    {
        return view('pos.AdminAnalystOD.fromAddmatrikindikator');
    }

    public function store(Request $request)
    {
        $unitkerja              = $request->unitkerja;
        $kodeunit               = $request->kodeunit;
        $object                 = $request->object;
        $indikator              = $request->indikator;
        $kewenangan             = $request->kewenangan;

        $data = new matrikindikator();
      


        $data->unitkerja        = $unitkerja;
        $data->kodeunit         = $kodeunit;
        $data->object           = $object;
        $data->indikator        = $indikator;
        $data->kewenangan       = $kewenangan;
        
        $data->save();

        if($data){
            return redirect('/AdminAnalystOD/list_matrikindikator');
        }
    }

    public function delete($id)
    {
        matrikindikator::find($id)->delete();
        return redirect('/AdminAnalystOD/list_matrikindikator');
    }

    public function edit(Request $request, $id)
    {
        $item = matrikindikator::where('id',$id)->get();
        return view('pos.AdminAnalystOD.editmatrikindikator',['item'=>$item]);
    }
    public function update(Request $request, $id)
    {
        $item = matrikindikator::find($id);

        $item->unitkerja    = $request->unitkerja;
        $item->kodeunit     = $request->kodeunit;
        $item->object       = $request->object;
        $item->indikator    = $request->indikator;
        $item->kewenangan   = $request->kewenangan;
        
        $item->save();
        return redirect('/AdminAnalystOD/list_matrikindikator');
    }
}
