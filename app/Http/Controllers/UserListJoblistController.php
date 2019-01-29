<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\jobdescreate;
use App\history_pesan;
use App\Events\JobdescApproved;

class UserListJoblistController extends Controller
{
    public function index(Request $request)
    {
        //----get user name--------
        // Auth::user()->username;
        //-------------------------
        $koreksi = history_pesan::where('nik',Auth::user()->userid)
        ->where('status',0)
        ->count();
        $userid  = Auth::user()->userid;
        $tj = jobdescreate::where('nikuser',$userid)->get();
        $data = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj,'koreksi'=>$koreksi];
        return view('menu.UserSuptMgrGM.listjobdescreate',$data);

        
    }
    public function store(Request $request){
        //$item =$request->item;
        //$decode = json_decode($item);
        //print_r($item);
        //die();
        //echo $item;
        //die();
        $id                    = $request->iddesc;
        $isipesan              = $request->isipesan;
        $nik                   = Auth::user()->userid;
        $nama                  = Auth::user()->username;
        $nikanalis             = $request->nikanalis;
        $namaanalis            = $request->namaanalis;
        $dilihat               = 0;
        $status                = 0;

        $data = new history_pesan();
        $data->jobdescreate_id      = $id;
        $data->pesan                = $isipesan;
        $data->nik                  = $nik;
        $data->nama                 = $nama;
        $data->nikanalis            = $nikanalis;
        $data->namaanalis           = $namaanalis; 
        $data->dilihat              = $dilihat;
        $data->status               = $status;
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
        history_pesan::where('jobdescreate_id',$id)->where('status',1)->update(['dilihat' => '1','tgldilihat'=>date("Y-m-d H:i:s")]);    
        
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
        $jobdescreate = jobdescreate::where('id',$id)->update(['approveuser' => '1','tglapproveuser' => date("Y-m-d H:i:s"),'posisiprogress'=>3]);    
        if($jobdescreate){
            $hsl='success';
            $j = jobdescreate::where('id', $id)->first();
            event(new JobdescApproved($j));
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    }
    
    public function konfirmasivalidanalis($id)
    {    
        $jobdescreate = jobdescreate::where('id',$id)->update(['konfirmvalidanalis' => '1','tglkonfirmvalidanalis' => date("Y-m-d H:i:s"),'posisiprogress'=>1]);    
        if($jobdescreate){
            $hsl='success';
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    } 

    function getjobdescreate(Request $request, $id){
        $job        =[];
        $jobres     =[];
        $unit       =[];
        $tools      =[];
        $mat        =[];
        $co         =[];
        $pen        =[];
        $ker        =[];
        $profil     =[];
        $profil_d   =[];
        $jobres = jobdescreate_res::where('jobdescreate_id',$id)
                    ->join('kata_kerja', 'jobdescreate_res.id_kata_kerja', '=', 'kata_kerja.id')
                    ->join('matrikindikator', 'jobdescreate_res.id_met_object', '=', 'matrikindikator.id')
                    ->select('jobdescreate_res.*', 'kata_kerja.keterangan', 'matrikindikator.object','matrikindikator.indikator')
                    ->get();
        // ini buat jon table
        // dd($jobres);
        $tools      = jobdescreate_tools::where('jobdescreate_id',$id)->get();
        $mat        = jobdescreate_materials::where('jobdescreate_id',$id)->get();
        $unit       = jobdescreate_unitkerja::where('jobdescreate_id',$id)->get();
        $co         = jobdescreate_conditions::where('jobdescreate_id',$id)->get();
        $pen        = jobdescreate_pen::where('jobdescreate_id',$id)->get();
        $ker        = jobdescreate_penga::where('jobdescreate_id',$id)->get();
        $profil     = profil::where('jobdescreate_id',$id)->get();
        $item       = jobdescreate::where('id',$id)->get();
        $profil_d   = profil_detail::where('jobdescreate_id',$id)->get();
        $job    = job::where('jobdescreate_id',$id)->get();
        $data   = array('item'=>$item,'job'=>$job,'jobres'=>$jobres,'unit'=>$unit,'tools'=>$tools,'mat'=>$mat,'co'=>$co,'pen'=>$pen,'ker'=>$ker,'profil'=>$profil,'profil_d'=>$profil_d);
        return $data;
    }

}
