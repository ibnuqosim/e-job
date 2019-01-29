<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\jobdescreate;
use App\structdisp;
use App\ZHROM0007;
use App\User;
use App\users;
use PDF;
use App\UserDetail;
use App\jobdescreate_res;
use App\jobrole_tujuan;
use App\kata_kerja;
use App\bahan_kerja;
use App\alat_kerja;
use App\lingkungan_kerja;
use App\pendidikan;
use App\pengalaman_kerja;  
use App\matrikindikator;
use App\matrikwewenang;
use App\persyaratan_fisik;
use App\jobdescreate_rel;
use App\jobdescreate_unitkerja;
use App\jobdescreate_tools;
use App\jobdescreate_conditions;
use App\jobdescreate_materials;
use App\jobdescreate_pen;
use App\jobdescreate_penga;
use App\abrevation;
use App\abrevation_detail;
use App\zhrom0013;
use App\zhrom0012;
use App\job;
use App\profil;
use App\profil_detail;
use App\history_pesan;


class jobdescreateController extends Controller
{
    public function index(Request $request)
    {
        $userid  = Auth::user()->userid;
        $tj      = jobdescreate::with(['job','jobdescreate_res' => function($query){
            $query->with('matrikinndikator')->get();
        },'jobdescreate_unitkerja'])->where('nikanalis',$userid)->get();
         dd($tj);
        $data   = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj];
        // $dk     = ['profil'=>'test','tj',tj=>$tj,'data'=>$tj];     

        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.listjobdescreate',$data);
    }
    public function strukturdir()
    {
        $userid     = Auth::user()->userid;
        $data       = User::where('userid',$userid)->first();
        $ret        = $data->structdisp->where('no','1');;
        return  $ret;
    }
    public function fromAdd(Request $request)
    {
        $strukturdir = $this->strukturdir();
        $data = ['strukturdir'=>$strukturdir];
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.formjobdescreate',$data);
    }
    public function delete(Request $request, $id){
        jobdescreate::where('id',$id)->delete();
        jobdescreate_res::where('jobdescreate_id',$id)->delete();
        jobdescreate_res::where('jobdescreate_id',$id)->delete();
        jobdescreate_unitkerja::where('jobdescreate_id',$id)->delete();
        jobdescreate_tools::where('jobdescreate_id',$id)->delete();
        jobdescreate_materials::where('jobdescreate_id',$id)->delete();
        jobdescreate_conditions::where('jobdescreate_id',$id)->delete();
        jobdescreate_pen::where('jobdescreate_id',$id)->delete();
        jobdescreate_penga::where('jobdescreate_id',$id)->delete();
        job::where('jobdescreate_id',$id)->delete();
        profil::where('jobdescreate_id',$id)->delete();
        profil_detail::where('jobdescreate_id',$id)->delete();
        return redirect('/AdminAnalystOD/listjobdescreate');

        

    }
    public function storeedit(Request $request, $id){
        // I. URAIAN JABATAN (Job Description)
        $getjab                                     = $request->getjab;
        $LvlOrg                                     = $request->LvlOrg;
        $NameofPosition                             = $request->NameofPosition;
        $NameofOrgUnitDinas                         = $request->NameofOrgUnitDinas;
        $NameofOrgUnitDivisi                        = $request->NameofOrgUnitDivisi;
        $NameofOrgUnitSubDirektorat                 = $request->NameofOrgUnitSubDirektorat;
        $NameofOrgUnitDirektorat                    = $request->NameofOrgUnitDirektorat;
        //dd($getjab);
        // II. TUJUAN JABATAN (Primary Job Role)
        $jobrole                                    = $request->jobrole;
        // IV. DIMENSI (Dimensions)
        $finansial                                  = $request->finansial;
        $nonfinansial                               = $request->nonfinansial;

        $persyaratan_fisik                          = $request->persyaratan_fisik;
        $gambar                                     = $request->gambar;
        //inpu analis
        $nikanalis                                  = $request->nikanalis;
        $analis                                     = $request->analis;
        //$user                                       = $request->namauser;
        //$pecahuser                                  = explode("-",$user);
        //$nikuser                                    = $pecahuser[0];
        //$namauser                                   = $pecahuser[1];
        //dd($user);
        $nikatasan                                  =$request->nikatasan;
        $namaatasan                                 =$request->namaatasan;
        //manajer odhcp
        // $userid  = Auth::user()->userid;
        // $ret = [];
        // $ret = file_get_contents('http://eos.krakatausteel.com/api/structdisp/'.$userid.'/minManagerBoss');
        // $jess=json_decode($ret);
        // //dd($getjab);
        // $nikapprove                                  = $jess->personnel_no;
        // $nameapprove                                  = $jess->name;

        $jobdescreate = jobdescreate::where('id',$id)
        ->update(['persyaratan_fisik' => $persyaratan_fisik,
        'finansial'=>$finansial,'nonfinansial'=>$nonfinansial,
        'jobrole'=>$jobrole]);    
        
        //dd($request->res);
        jobdescreate_res::where('jobdescreate_id',$id)->delete();
        
        if($request->res || $request->divindi || $request->divresk || $request->divwew){
            $count_res = count($request->res);
            $resunit = count($request->divresk);
            $count_resindikator = count($request->divindi);
            $un_div = count($request->divwew);
            $max = max($count_res,$resunit,$count_resindikator,$un_div);
    
            for ($i=0; $i < $max; $i++) { 
                $jobdescreate_res = new jobdescreate_res();
                $jobdescreate_res->jobdescreate_id  = $id;
                $jobdescreate_res->id_kata_kerja    = isset($request->res[$i])?$request->res[$i]:NULL;
                $jobdescreate_res->id_met_object    = isset($request->divresk[$i])?$request->divresk[$i]:NULL;
                $jobdescreate_res->id_met_indikator = isset($request->divindi[$i])?$request->divindi[$i]:NULL;

                $jobdescreate_res->id_met_kewenangan = isset($request->divwew[$i])?$request->divwew[$i]:NULL;
                $jobdescreate_res->save();
            }
        }
        jobdescreate_unitkerja::where('jobdescreate_id',$id)->delete();
        if($request->work || $request->divhal || $request->divhalk || $request->divhalks){
                
            $count_work = count($request->work);
            $divhal = count($request->divhal);
            $count_divhalk = count($request->divhalk);
            $divhalks = count($request->divhalks);
            $max = max($count_work,$divhal,$count_divhalk,$divhalks);
            
            for ($i=0; $i < $max; $i++) { 
                $jobdescreate_unitkerja = new jobdescreate_unitkerja();
                $jobdescreate_unitkerja->jobdescreate_id = $id;
                $jobdescreate_unitkerja->id_emp_cskt_ltext = isset($request->work[$i])?$request->work[$i]:NULL;
                $jobdescreate_unitkerja->id_hal_internal = isset($request->divhal[$i])?$request->divhal[$i]:NULL;
                $jobdescreate_unitkerja->id_eksternal = isset($request->divhalk[$i])?$request->divhalk[$i]:NULL;
                $jobdescreate_unitkerja->id_hal_external = isset($request->divhalks[$i])?$request->divhalks[$i]:NULL;
                $jobdescreate_unitkerja->save();
            }
        }
        jobdescreate_tools::where('jobdescreate_id',$id)->delete();
        if($request->tools){
                
            $count_tools = count($request->tools);
            
            for ($i=0; $i < $count_tools; $i++) { 
                $jobdescreate_tools = new jobdescreate_tools();
                $jobdescreate_tools->jobdescreate_id = $id;
                $jobdescreate_tools->id_deskripsi = isset($request->tools[$i])?$request->tools[$i]:NULL;
                $jobdescreate_tools->save();
            }
        }
        jobdescreate_materials::where('jobdescreate_id',$id)->delete();
        if($request->materials){
                
            $count_materials = count($request->materials);

            for ($i=0; $i < $count_materials; $i++) { 
                $jobdescreate_materials = new jobdescreate_materials();
                $jobdescreate_materials->jobdescreate_id = $id;
                $jobdescreate_materials->id_deskripsi = isset($request->materials[$i])?$request->materials[$i]:NULL;
                $jobdescreate_materials->save();
            }
        }
        jobdescreate_conditions::where('jobdescreate_id',$id)->delete();
        if($request->conditions){
                
            $count_conditions = count($request->conditions);

            for ($i=0; $i < $count_conditions; $i++) { 
                $jobdescreate_conditions = new jobdescreate_conditions();
                $jobdescreate_conditions->jobdescreate_id = $id;
                $jobdescreate_conditions->id_deskripsi = isset($request->conditions[$i])?$request->conditions[$i]:NULL;
                $jobdescreate_conditions->save();
            }
        }
        jobdescreate_pen::where('jobdescreate_id',$id)->delete();
        if($request->pen){
                
            $count_pen = count($request->pen);

            for ($i=0; $i < $count_pen; $i++) { 
                $jobdescreate_pen = new jobdescreate_pen();
                $jobdescreate_pen->jobdescreate_id = $id;
                $jobdescreate_pen->id_jenjang = isset($request->pen[$i])?$request->pen[$i]:NULL;
                $jobdescreate_pen->save();
            }
        }
        jobdescreate_penga::where('jobdescreate_id',$id)->delete();
        if($request->penga){
                
            $count_penga = count($request->penga);

            for ($i=0; $i < $count_pen; $i++) { 
                $jobdescreate_penga = new jobdescreate_penga();
                $jobdescreate_penga->jobdescreate_id = $id;
                $jobdescreate_penga->id_keterangan = isset($request->penga[$i])?$request->penga[$i]:NULL;
                $jobdescreate_penga->save();
            }
        }
        return redirect('/AdminAnalystOD/listjobdescreate');

       

    }

    public function store(Request $request)
    {
        // I. URAIAN JABATAN (Job Description)
        $getjab                                     = $request->getjab;
        //dd($getjab);
        $LvlOrg                                     = $request->LvlOrg;
        $NameofPosition                             = $request->NameofPosition;
        $NameofOrgUnitDinas                         = $request->NameofOrgUnitDinas;
        $NameofOrgUnitDivisi                        = $request->NameofOrgUnitDivisi;
        $NameofOrgUnitSubDirektorat                 = $request->NameofOrgUnitSubDirektorat;
        $NameofOrgUnitDirektorat                    = $request->NameofOrgUnitDirektorat;
        
        // II. TUJUAN JABATAN (Primary Job Role)
        $jobrole                                    = $request->jobrole;
        // IV. DIMENSI (Dimensions)
        $finansial                                  = $request->finansial;
        $nonfinansial                               = $request->nonfinansial;

        $persyaratan_fisik                          = $request->persyaratan_fisik;
        $gambar                                     = $request->gambar;
        //inpu analis
        $nikanalis                                  = $request->nikanalis;
        $analis                                     = $request->analis;

        $user                                       = $request->namauser;
        $pecahuser                                  = explode("-",$user);
        $nikuser                                    = $pecahuser[0];
        $namauser                                   = $pecahuser[1];
        

        

        $nikatasan                                  =$request->nikatasan;
        $namaatasan                                 =$request->namaatasan;

        //manajer odhcp
        $userid  = Auth::user()->userid;
        $ret = [];
        $ret = file_get_contents('http://eos.krakatausteel.com/api/structdisp/'.$userid.'/minManagerBoss');
        $jess=json_decode($ret);
        //dd($jess);
        $nikapprove                                  = $jess->personnel_no;
        $nameapprove                                  = $jess->name;



        // save atasan
        //$atasan = $this->atasan($nikuser);
        //print_r($atasan);
        //die();


        $data = new jobdescreate();
        // I. URAIAN JABATAN (Job Description)
        $data->no_jabatan                           = $getjab;
        $data->name_jabatan                         = $NameofPosition;
        $data->gol_jabatan                          = $LvlOrg;
        $data->dinas                                = $NameofOrgUnitDinas;
        $data->divisi                               = $NameofOrgUnitDivisi;
        $data->subdirektorat                        = $NameofOrgUnitSubDirektorat;
        $data->direktorat                           = $NameofOrgUnitDirektorat;
        // II. TUJUAN JABATAN (Primary Job Role)
        $data->jobrole                              = $jobrole;
        // IV. DIMENSI (Dimensions)
        $data->finansial                            = $finansial;
        $data->nonfinansial                         = $nonfinansial;
        $data->persyaratan_fisik                    = $persyaratan_fisik;

        // $file->gambar                            = $gambar;
        $data->gambar                               = $gambar;
        // save analis
        $data->nikanalis                            = $nikanalis;
        $data->analis                               = $analis;


        $data->nikuser                              = $nikuser;
        $data->namauser                             = $namauser;

        $data->nikatasan                            = $nikatasan;
        $data->atasan                               = $namaatasan;

        $data->nikapprove                           = $nikapprove;
        $data->approve                              = $nameapprove;

        $data->save();
        
        $data_id = jobdescreate::orderBy('id','DESC')->first();
        if($data){
            //print_r("jabatan=".$request->jabatanatasanlangsung."-".$request->jabatanbawahanlangsung);
           // die();
            if($request->jabatanatasanlangsung || $request->jabatanbawahanlangsung || $request->jumlah){

                //print_r(count($request->jabatanatasanlangsung));
                //die();
                // $count_jbt      = count($request->jabatanatasanlangsung);
                $resjabatan     = count($request->jabatanbawahanlangsung);
                $count_jumlah   = count($request->jumlah);
                $max            = max($resjabatan,$count_jumlah);
        
                for ($i=0; $i < $max; $i++) { 
                    $job = new job();
                    $job->jobdescreate_id  = $data_id->id;
                    $job->jabatanatasanlangsung     = isset($request->jabatanatasanlangsung)?$request->jabatanatasanlangsung:NULL;
                    $job->jabatanbawahanlangsung    = isset($request->jabatanbawahanlangsung[$i])?$request->jabatanbawahanlangsung[$i]:NULL;
                    $job->jumlah                    = isset($request->jumlah[$i])?$request->jumlah[$i]:NULL;
                    $job->save();
                }
            }else{
                echo "list kosong";
                die();

            }


            if($request->res || $request->divindi || $request->divresk || $request->divwew){
                $count_res = count($request->res);
                $resunit = count($request->divresk);
                $count_resindikator = count($request->divindi);
                $un_div = count($request->divwew);
                $max = max($count_res,$resunit,$count_resindikator,$un_div);
        
                for ($i=0; $i < $max; $i++) { 
                    $jobdescreate_res = new jobdescreate_res();
                    $jobdescreate_res->jobdescreate_id  = $data_id->id;
                    $jobdescreate_res->id_kata_kerja    = isset($request->res[$i])?$request->res[$i]:NULL;
                    $jobdescreate_res->id_met_object    = isset($request->divresk[$i])?$request->divresk[$i]:NULL;
                    $jobdescreate_res->id_met_indikator = isset($request->divindi[$i])?$request->divindi[$i]:NULL;

                    $jobdescreate_res->id_met_kewenangan = isset($request->divwew[$i])?$request->divwew[$i]:NULL;
                    $jobdescreate_res->save();
                }
            }

            if($request->work || $request->divhal || $request->divhalk || $request->divhalks){
                
                $count_work = count($request->work);
                $divhal = count($request->divhal);
                $count_divhalk = count($request->divhalk);
                $divhalks = count($request->divhalks);
                $max = max($count_work,$divhal,$count_divhalk,$divhalks);
                
                for ($i=0; $i < $max; $i++) { 
                    $jobdescreate_unitkerja = new jobdescreate_unitkerja();
                    $jobdescreate_unitkerja->jobdescreate_id = $data_id->id;
                    $jobdescreate_unitkerja->id_emp_cskt_ltext = isset($request->work[$i])?$request->work[$i]:NULL;
                    $jobdescreate_unitkerja->id_hal_internal = isset($request->divhal[$i])?$request->divhal[$i]:NULL;
                    $jobdescreate_unitkerja->id_eksternal = isset($request->divhalk[$i])?$request->divhalk[$i]:NULL;
                    $jobdescreate_unitkerja->id_hal_external = isset($request->divhalks[$i])?$request->divhalks[$i]:NULL;
                    $jobdescreate_unitkerja->save();
                }
            }

            if($request->tools){
                
                $count_tools = count($request->tools);
                
                for ($i=0; $i < $count_tools; $i++) { 
                    $jobdescreate_tools = new jobdescreate_tools();
                    $jobdescreate_tools->jobdescreate_id = $data_id->id;
                    $jobdescreate_tools->id_deskripsi = isset($request->tools[$i])?$request->tools[$i]:NULL;
                    $jobdescreate_tools->save();
                }
            }

            if($request->materials){
                
                $count_materials = count($request->materials);

                for ($i=0; $i < $count_materials; $i++) { 
                    $jobdescreate_materials = new jobdescreate_materials();
                    $jobdescreate_materials->jobdescreate_id = $data_id->id;
                    $jobdescreate_materials->id_deskripsi = isset($request->materials[$i])?$request->materials[$i]:NULL;
                    $jobdescreate_materials->save();
                }
            }

            if($request->conditions){
                
                $count_conditions = count($request->conditions);

                for ($i=0; $i < $count_conditions; $i++) { 
                    $jobdescreate_conditions = new jobdescreate_conditions();
                    $jobdescreate_conditions->jobdescreate_id = $data_id->id;
                    $jobdescreate_conditions->id_deskripsi = isset($request->conditions[$i])?$request->conditions[$i]:NULL;
                    $jobdescreate_conditions->save();
                }
            }

            if($request->pen){
                
                $count_pen = count($request->pen);

                for ($i=0; $i < $count_pen; $i++) { 
                    $jobdescreate_pen = new jobdescreate_pen();
                    $jobdescreate_pen->jobdescreate_id = $data_id->id;
                    $jobdescreate_pen->id_jenjang = isset($request->pen[$i])?$request->pen[$i]:NULL;
                    $jobdescreate_pen->save();
                }
            }

            if($request->penga){
                
                $count_penga = count($request->penga);

                for ($i=0; $i < $count_pen; $i++) { 
                    $jobdescreate_penga = new jobdescreate_penga();
                    $jobdescreate_penga->jobdescreate_id = $data_id->id;
                    $jobdescreate_penga->id_keterangan = isset($request->penga[$i])?$request->penga[$i]:NULL;
                    $jobdescreate_penga->save();
                }
            }

             if($request->penga){
                
                $count_penga = count($request->penga);

                for ($i=0; $i < $count_pen; $i++) { 
                    $jobdescreate_penga = new jobdescreate_penga();
                    $jobdescreate_penga->jobdescreate_id = $data_id->id;
                    $jobdescreate_penga->id_keterangan = isset($request->penga[$i])?$request->penga[$i]:NULL;
                    $jobdescreate_penga->save();
                }
            }

            if($request->namajabatan || $request->noorg || $request->golongan || $request->unitkerja || $request->nojabatan || $request->job ){
                $namajabatan    = $request->namajabatan;
                $noorg          = $request->noorg;
                $golongan       = $request->golongan;
                $unitkerja      = $request->unitkerja;
                $nojabatan      = $request->nojabatan;
                $jobgroup       = $request->jobgroup;
                
                $profil = new profil();

                $profil->jobdescreate_id  = $data_id->id;
                $profil->namajabatan      = $namajabatan;
                $profil->noorg            = $noorg;
                $profil->golongan         = $golongan;
                $profil->unitkerja        = $unitkerja;
                $profil->nojabatan        = $nojabatan;
                $profil->jobgroup         = $jobgroup;
                
                $profil->save();
            }

            if($request->groupaspek || $request->namakompetensi || $request->proficiency ){
                
                $count_grup = count($request->groupaspek);
                $count_nama = count($request->namakompetensi);
                $count_pro = count($request->proficiency);
                $max = max($count_grup,$count_nama,$count_pro);
                
                for ($i=0; $i < $max; $i++) { 
                    $profil_detail = new profil_detail();
                    $profil_detail->jobdescreate_id = $data_id->id;
                    $profil_detail->groupaspek = isset($request->groupaspek[$i])?$request->groupaspek[$i]:'';
                    $profil_detail->namakompetensi = isset($request->namakompetensi[$i])?$request->namakompetensi[$i]:'';
                    $profil_detail->proficiency = isset($request->proficiency[$i])?$request->proficiency[$i]:'';
                    $profil_detail->save();
                }
            }
            
            
            return redirect('/AdminAnalystOD/listjobdescreate');
        }
    }
    public function konfirmasipesan(Request $request,$id){
        $history = history_pesan::where('id',$id)->update(['status' => '1','tglrevisi'=>date("Y-m-d H:i:s")]);    
        
        if($history){
            $hsl='success';
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    }
    public function pdf($id)
    {
        $data = jobdescreate::where('id',$id)->get();
        // dd($data);
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.pdf', [ 'data' => $data ]);
    }
    
   
    public function objecysistem(Request $request,$gol = null)
    {   
        $arr = [];
        $ret = [];
        $data = jobrole_tujuan::where('deskripsi','like','%'.$request->q.'%')
                    ->where('gol_id',$gol)
                    ->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->id,'text'=>$value->deskripsi.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
       
    } 
    public function resjabatan(Request $request,$gol = null)

    {   
        $arr = [];
        $ret = [];
        $data = kata_kerja::where('keterangan','like','%'.$request->q.'%')
                ->where('level',$gol)
                ->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->id,'text'=>$value->keterangan] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    }     
    public function resunitindikator(Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];

        $data = matrikindikator::where('object','like','%'.$request->q.'%')
                ->where('kodeunit',$kode)
                ->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->id,'text'=>$value->object,'indikator'=>$value->indikator,'kewenangan'=>$value->kewenangan] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
  
    public function bertangung(Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = structdisp::where('no','1')->where('emppostx','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->emppostx,'text'=>$value->emppostx.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function wewenangauthorities (Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];
        $data = matrikwewenang::where('wewenang','like','%'.$request->q.'%')
                ->where('kodeunit',$kode)
                ->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->id,'text'=>$value->wewenang.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function Workinternal (Request $request) 
    {   

        $arr = [];
        $ret = [];
        $data = structdisp::where('emp_cskt_ltext','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->emp_cskt_ltext,'text'=>$value->emp_cskt_ltext] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function intermsiternal (Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];
        $data = bahan_kerja::where('deskripsi','like','%'.$request->q.'%')
                ->where('kodeunit',$kode)
                ->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->id,'text'=>$value->deskripsi.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function tmcalatkerja (Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];
        $data = alat_kerja::where('deskripsi','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->deskripsi,'text'=>$value->deskripsi] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function tmcbahankerja (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = bahan_kerja::where('deskripsi','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->deskripsi,'text'=>$value->deskripsi] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function tmclingkkerja (Request $request,$kode = null)
    {   

        $arr = [];
        $ret = [];
        $data = lingkungan_kerja::where('deskripsi','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->deskripsi,'text'=>$value->deskripsi] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function fisik (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = persyaratan_fisik::where('persyaratan','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->persyaratan,'text'=>$value->persyaratan.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function profil (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = structdisp::where('no','1')->where('emppostx','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->emppostx,'text'=>$value->emppostx.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    
    public function pengalaman (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = pengalaman_kerja::where('keterangan','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->keterangan,'text'=>$value->keterangan.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    
    public function managerodhcp (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = structdisp::where('dirname','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->dirname,'text'=>$value->dirname.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function namauser (Request $request)
    {   
        
        $arr = [];
        $ret = [];
        $data = structdisp::where('no','1')->where('empname','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) { 
            array_push($arr,['id'=>$value->empnik.'-'.$value->empname,'text'=>$value->empnik.'-'.$value->empname." (".$value->emportx.") "] );
        }
        $ret = ['results' =>
        $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function namaUserApi (Request $request,$id)
    {   
        $arr = [];
        $ret = [];
        $ret = file_get_contents('http://eos.krakatausteel.com/api/structdisp/shortAbbrOrg/'.$id);
        $jess=json_decode($ret);
        $collection = collect($jess);

        $filtered = $collection->filter(function ($value, $key) use ($request) {
            return str_is('*'.strtolower($request->q).'*', strtolower($value->empname) );
        });
        
        $x = $filtered->all();

        foreach ($x as $key => $value) {
            array_push($arr,['id'=>$value->empnik.'-'.$value->empname, 'text'=>$value->empnik.'-'.$value->empname." (".$value->emportx.") "]);
        }
        $ret = ['results' =>
        $arr ,'pagination'=>['more'=>true]];
        
        // preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
        return $ret;
    } 


    public function analis (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = structdisp::where('empname','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->empname,'text'=>$value->empname.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    public function atasan ($nik)
    {   
        $data = structdisp::where('empnik',$nik)
        ->where('no','2')
        //->groupBy('no')
        ->first();       
        return $data;
    } 
    public function pendidikan (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = pendidikan::where('jenjang','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->jenjang,'text'=>$value->jenjang] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 
    
    public function AbbrPosition (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = ZHROM0007::where('AbbrPosition','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->AbbrPosition,'abbrUnit'=>$value->AbbrOrgUnitDivisi,'text'=>$value->AbbrPosition.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function getjab ($jabatan)
    {   
        $data = ZHROM0007::where('AbbrPosition', $jabatan)
        ->groupBy('AbbrPosition')
        ->first();       
        return $data;
    }

    public function nojabatan (Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];
        $data = zhrom0013::where('jabatanatasanlangsung','like','%'.$request->q.'%')
                ->where('nojabatan',$kode)
                ->get();
        return $data;
    } 

    public function detail ($un)
    {   
        $data = zhrom0012::where('nojabatan', $un)
        ->groupBy('nojabatan')
        ->first();       
        return $data;
    }

    public function abbdetail (Request $request,$kode = null)
    {   
        $arr = [];
        $ret = [];
        $data = zhrom0012::where('namakompetensi','like','%'.$request->q.'%')
                ->where('nojabatan',$kode)
                ->get();
        return $data;
    } 


    public function konfirmasi($id)
    {   
        //dd($id);
        //$jobdescreate = jobdescreate::where('id',$id)->update(['verifikasi' => 'yes']);    
        $jobdescreate = jobdescreate::where('id',$id)->update(['approveanalis' => '1','tglapproveanalis' => date("Y-m-d H:i:s")]);    
        
        
        if($jobdescreate){
            $hsl='success';
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    } 
    
    public function abrevationno (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = abrevation::where('abrevationno','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->abrevationno,'text'=>$value->abrevationno.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
        return $ret;
    } 

    public function edit(Request $request, $id)
    {
        $jobres     =[];
        $unit       =[];
        $tools      =[];
        $mat        =[];
        $item = jobdescreate::where('id',$id)->get();
        $jobres = jobdescreate_res::where('jobdescreate_id',$id)
                    ->join('kata_kerja', 'jobdescreate_res.id_kata_kerja', '=', 'kata_kerja.id')
                    ->join('matrikindikator', 'jobdescreate_res.id_met_object', '=', 'matrikindikator.id')
                    ->select('jobdescreate_res.*', 'kata_kerja.keterangan', 'matrikindikator.object','matrikindikator.indikator')
                    ->get();
        $unit       = jobdescreate_unitkerja::where('jobdescreate_id',$id)->get();
        $tools      = jobdescreate_tools::where('jobdescreate_id',$id)->get();
        $mat        = jobdescreate_materials::where('jobdescreate_id',$id)->get();
        $co         = jobdescreate_conditions::where('jobdescreate_id',$id)->get();
        $pen        = jobdescreate_pen::where('jobdescreate_id',$id)->get();
        $ker        = jobdescreate_penga::where('jobdescreate_id',$id)->get();
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.editjobdescreate',['item'=>$item,
        'jobres'=>$jobres,'unit'=>$unit,'tools'=>$tools,'mat'=>$mat,'co'=>$co,'pen'=>$pen,'ker'=>$ker,'id'=>$id]);
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