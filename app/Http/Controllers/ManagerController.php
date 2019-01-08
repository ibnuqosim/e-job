<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\jobdescreate;
use App\history_pesan;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        //----get user name--------
        // Auth::user()->username;
        //-------------------------
        $koreksi = history_pesan::where('nik',Auth::user()->userid)
        ->where('status',0)
        ->count();
        $tj = jobdescreate::all();
        $data = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj,'koreksi'=>$koreksi];
        return view('Menu.ManagerOD.Listmanagerod',$data);
        // return view('UserSuptMgrGM.ListJoblist');
    }
    public function store(Request $request){
        $id                    = $request->iddesc;
        $isipesan              = $request->isipesan;
        $nik                   = Auth::user()->userid;
        $nama                  = Auth::user()->username;
        $nikanalis             = $request->nikanalis;
        $namaanalis            = $request->namaanalis;
        $dilihat               = 0;

        $data = new history_pesan();
        $data->jobdescreate_id      = $id;
        $data->pesan                = $isipesan;
        $data->nik                  = $nik;
        $data->nama                 = $nama;
        $data->nikanalis            = $nikanalis;
        $data->namaanalis           = $namaanalis;
        $data->dilihat              = $dilihat;
        $data->save();

        return redirect('/UserSuptMgrGM/listjobdescreate');

        //echo $isipesan."-".$id;


    }
    public function ShowAjax(Request $request)
    {
        $return = [];
        $namauser = Auth::user()->username;
        $job = jobdescreate::where('namauser',$namauser)->get();

        foreach ($job as $key => $value) {
            array_push($return,
                array(
                    'no' => $key+1,
                    'no_jabatan' => $value->subdirektorat,
                    'namauser' => $value->namauser,
                    'analis' => $value->analis,
                )
            );
                
        }
        return array('data'=>$return);
    }
    public function showhistorypesan(Request $request,$id){
        //$id =1;
        $testedit =2;
        $status='';
        $return = [];
        $history = history_pesan::where('jobdescreate_id',$id)->get();
        foreach($history as $key => $value){
            if($value->status==null || $value->status==0){
                $status = "<a class='btn btn-warning' title='Belum direvisi'>Belum direvisi</>";
            }else{
                $status = "<a class='btn btn-success' title='Sudah direvisi'>Sudah direvisi (".$value->tglrevisi.")</>";
            }
            array_push($return,
            array(
            'no'=>$key+1,
            'nama'=>$value->nama,
            'pesan'=>$value->pesan,
            'namaanalis'=>$value->namaanalis,
            'created_at'=>date_format($value->created_at,"Y-m-d H:i:s"),
            'status'=>$status
            )
            
        
        );

        }
        return array('data'=>$return);

    }
    public function showhistorypesananalis(Request $request,$id){
        //$id =1;
        $testedit =2;
        $status='';
        $return = [];
        $history = history_pesan::where('jobdescreate_id',$id)->get();
        foreach($history as $key => $value){
            if($value->status==null || $value->status==0){
                $status = "<a class='btn btn-warning' title='Klik untuk konfirmasi revisi !' onclick='konfirmasirevisi(".$value->id.",".$value->jobdescreate_id.");'>Belum direvisi</>";
            }else{
                $status = "<a class='btn btn-success' title='Sudah direvisi'>Sudah direvisi (".$value->tglrevisi.")</>";
            }
            array_push($return,
            array(
            'no'=>$key+1,
            'nama'=>$value->nama,
            'pesan'=>$value->pesan,
            'namaanalis'=>$value->namaanalis,
            'created_at'=>date_format($value->created_at,"Y-m-d H:i:s"),
            'status'=>$status
            )
            
        
        );

        }
        return array('data'=>$return);

    }
    public function konfirmasi($id)
    {   
        //dd($id);
        //$jobdescreate = jobdescreate::where('id',$id)->update(['verifikasi' => 'yes']);    
        $jobdescreate = jobdescreate::where('id',$id)->update(['approveodhcp' => '1','tglapproveodhcp' => date("Y-m-d H:i:s")]);    
        
        
        if($jobdescreate){
            $hsl='success';
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    } 
}
