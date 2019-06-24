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
use App\jobdescreate_fisik;
use App\Approval_h;
use Storage;
use File;



class jobdescreateController extends Controller
{
    public $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=> false,
            "verify_peer_name"=> false,
        ),
      );

    public function index(Request $request)
    {
        $userid  = Auth::user()->userid;
        $tj      = jobdescreate::with(['job','jobdescreate_res' => function($query){
            $query->with('matrikinndikator')->get();
        },'jobdescreate_unitkerja'])->where('nikanalis',$userid)->get();
        // dd($tj);
        $pdf = jobdescreate::join('job', 'jobdescreate.id', '=', 'job.jobdescreate_id')
        ->select('jobdescreate.*', 'job.jabatanatasanlangsung')
        ->get();
        //dd($pdf);
        $data   = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj,'pdf'=>$pdf];
        
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
        $abbr =[];
        $abbr = ZHROM0007::get();
        $strukturdir = $this->strukturdir();
        $data = ['strukturdir'=>$strukturdir,'abbr'=>$abbr];
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.formjobdescreate',$data);
    }
    public function delete(Request $request, $id){
        $datajob = jobdescreate::where('id',$id)->get();
        $gambar = $datajob[0]->gambar;
        if($gambar){
            $explgambar = explode("/",$gambar);
            $filename =$explgambar[1];
            $lokfile =storage_path().'/app/jobdesc/'.$filename;
            if (File::exists($lokfile))
            {
                unlink($lokfile);
            }
        }

        jobdescreate::where('id',$id)->delete();
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
        jobdescreate_fisik::where('jobdescreate_id',$id)->delete();
        Approval_h::where('jobdescreate_id',$id)->delete();
        history_pesan::where('jobdescreate_id',$id)->delete();
        return redirect('/AdminAnalystOD/listjobdescreate')->with('status', 'Berhasil di delete');

        

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
        $gambar                                     = $request->gambar;
        //inpu analis
        $nikanalis                                  = $request->nikanalis;
        $analis                                     = $request->analis;

        $nikatasan                                  =$request->nikatasan;
        $namaatasan                                 =$request->namaatasan;

        $datajob = jobdescreate::where('id',$id)->get();
        $gambar = $datajob[0]->gambar;
        if($gambar){
            $explgambar = explode("/",$gambar);
            $filename =$explgambar[1];
            $lokfile =storage_path().'/app/jobdesc/'.$filename;
        }else{
            $filename='';
            $lokfile='';
        }
        
      
       //Storage::disk('public')->path($filename);
        //unlink($lokfile);
        //dd(storage_path());
        $path = 'jobdesc/'.$filename;
        if (File::exists($lokfile) && $request->gambar!=null)
        {
            unlink($lokfile);
            $path = $request->gambar->store('jobdesc');
        }
        if (!File::exists($lokfile) && $request->gambar!=null)
        {
            $path = $request->gambar->store('jobdesc');
        }
        if($lokfile==''&& $request->gambar!=null){
            $path = $request->gambar->store('jobdesc');
        }

        $jobdescreate = jobdescreate::where('id',$id)
        ->update([
        'finansial'=>$finansial,'nonfinansial'=>$nonfinansial,
        'jobrole'=>$jobrole,'gambar'=>$path]);    
        
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

            for ($i=0; $i < $count_penga; $i++) { 
                $jobdescreate_penga = new jobdescreate_penga();
                $jobdescreate_penga->jobdescreate_id = $id;
                $jobdescreate_penga->id_keterangan = isset($request->penga[$i])?$request->penga[$i]:NULL;
                $jobdescreate_penga->save();
            }
        }

        jobdescreate_fisik::where('jobdescreate_id',$id)->delete();
        if($request->fisik){
                
            $count_fisik = count($request->fisik);

            for ($i=0; $i < $count_fisik; $i++) { 
                $jobdescreate_fisik = new jobdescreate_fisik();
                $jobdescreate_fisik->jobdescreate_id = $id;
                $jobdescreate_fisik->id_persyaratan = isset($request->fisik[$i])?$request->fisik[$i]:NULL;
                $jobdescreate_fisik->save();
            }
        }
        return redirect('/AdminAnalystOD/listjobdescreate')->with('status', 'Berhasil di update');

       

    }

    public function store(Request $request)
    {
        $userid  = Auth::user()->userid;
        // I. URAIAN JABATAN (Job Description)
        $getjab                                     = $request->getjab;
        //dd($getjab);
        $LvlOrg                                     = $request->LvlOrg;
        $NameofPosition                             = preg_replace('/\s*\([a-zA-Z0-9]+\)/', '', $request->NameofPosition);
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
        //cari nama jabatan analis
        
        $retjab    = [];
        //$retjab    = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$userid);
        $retjab = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$userid, false, stream_context_create($this->arrContextOptions));
        $jessjab   =json_decode($retjab);
        $jabanalis = $jessjab->position_name;


        // $approveanalis                              = 1;
        // $tglapproveanalis                           = date('Y-m-d H:i:s');
        $approveanalis                              = 0;
        $tglapproveanalis                           = '';

        $user                                       = $request->namauser;
        $pecahuser                                  = explode("-",$user);
        $nikuser                                    = $pecahuser[0];
        $namauser                                   = $pecahuser[1];
        $jabuser                                    = $pecahuser[2];
        

        

        $nikatasan                                  =$request->nikatasan;
        $namaatasan                                 =$request->namaatasan;

        //manajer odhcp
        
        $ret = [];
        //$ret = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$userid.'/minManagerBoss');
        $ret = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$userid.'/minManagerBoss', false, stream_context_create($this->arrContextOptions));
        $jess=json_decode($ret);
        //dd($jess);
        $nikapprove                                  = $jess->personnel_no;
        $nameapprove                                 = $jess->name;
        $jabapprove                                  = $jess->position_name;



        // save atasan
        //$atasan = $this->atasan($nikuser);
        //print_r($atasan);
        //die();
        if($request->gambar!=null){
            $path = $request->gambar->store('jobdesc');
        }
        
        
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
        // $file->gambar                            = $gambar;
        $data->gambar                               = $gambar;
        // save analis
        $data->nikanalis                            = $nikanalis;
        $data->analis                               = $analis;
        $data->jabanalis                            = $jabanalis;
        $data->approveanalis                        = $approveanalis;
        $data->konfirmvalidanalis                   = 0;
        $data->tglapproveanalis                     = $tglapproveanalis;
        


        $data->nikuser                              = $nikuser;
        $data->namauser                             = $namauser;
        $data->jabuser                              = $jabuser;
        $data->approveuser                          = 0;

        $data->nikatasan                            = $nikatasan;
        $data->atasan                               = $namaatasan;

        $data->nikapprove                           = $nikapprove;
        $data->approve                              = $nameapprove;
        $data->jabapprove                           = $jabapprove;
        
        $data->approveodhcp                         = 0;
        $data->posisiprogress                       = 0;
        $data->gambar                               = $path;

        $data->save();

        
        
        $data_id = jobdescreate::orderBy('id','DESC')->first();

        // $app_h = new Approval_h();
        // $app_h->jobdescreate_id = $data_id->id;
        // $app_h->nik = $nikanalis;
        // $app_h->nama =$analis;
        // $app_h->sebagai ='Analis';
        // $app_h->waktu =date('Y-m-d H:i:s');
        // $app_h->save();

        
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
                    $job->jabatanatasanlangsung     = isset($request->jabatanatasanlangsung)?$request->jabatanatasanlangsung:'';
                    $job->jabatanbawahanlangsung    = isset($request->jabatanbawahanlangsung[$i])?$request->jabatanbawahanlangsung[$i]:'';
                    $job->jumlah                    = isset($request->jumlah[$i])?$request->jumlah[$i]:'';
                    $job->save();
                }
            }else{
                echo "";
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
                    $jobdescreate_res->id_kata_kerja    = isset($request->res[$i])?$request->res[$i]:'';
                    $jobdescreate_res->id_met_object    = isset($request->divresk[$i])?$request->divresk[$i]:'';
                    $jobdescreate_res->id_met_indikator = isset($request->divindi[$i])?$request->divindi[$i]:'';

                    $jobdescreate_res->id_met_kewenangan = isset($request->divwew[$i])?$request->divwew[$i]:'';
                    $jobdescreate_res->save();
                }
            }else{
                echo "";
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
            }else{
                echo "";
            }

            if($request->tools){
                
                $count_tools = count($request->tools);
                
                for ($i=0; $i < $count_tools; $i++) { 
                    $jobdescreate_tools = new jobdescreate_tools();
                    $jobdescreate_tools->jobdescreate_id = $data_id->id;
                    $jobdescreate_tools->id_deskripsi = isset($request->tools[$i])?$request->tools[$i]:NULL;
                    $jobdescreate_tools->save();
                }
            }else{
                echo "";
            }

            if($request->materials){
                
                $count_materials = count($request->materials);

                for ($i=0; $i < $count_materials; $i++) { 
                    $jobdescreate_materials = new jobdescreate_materials();
                    $jobdescreate_materials->jobdescreate_id = $data_id->id;
                    $jobdescreate_materials->id_deskripsi = isset($request->materials[$i])?$request->materials[$i]:NULL;
                    $jobdescreate_materials->save();
                }
            }else{
                echo "";
            }

            if($request->conditions){
                
                $count_conditions = count($request->conditions);

                for ($i=0; $i < $count_conditions; $i++) { 
                    $jobdescreate_conditions = new jobdescreate_conditions();
                    $jobdescreate_conditions->jobdescreate_id = $data_id->id;
                    $jobdescreate_conditions->id_deskripsi = isset($request->conditions[$i])?$request->conditions[$i]:NULL;
                    $jobdescreate_conditions->save();
                }
            }else{
                echo "";
            }

            if($request->pen){
                
                $count_pen = count($request->pen);

                for ($i=0; $i < $count_pen; $i++) { 
                    $jobdescreate_pen = new jobdescreate_pen();
                    $jobdescreate_pen->jobdescreate_id = $data_id->id;
                    $jobdescreate_pen->id_jenjang = isset($request->pen[$i])?$request->pen[$i]:NULL;
                    $jobdescreate_pen->save();
                }
            }else{
                echo "";
            }

            if($request->penga){
                
                $count_penga = count($request->penga);

                for ($i=0; $i < $count_pen; $i++) { 
                    $jobdescreate_penga = new jobdescreate_penga();
                    $jobdescreate_penga->jobdescreate_id = $data_id->id;
                    $jobdescreate_penga->id_keterangan = isset($request->penga[$i])?$request->penga[$i]:NULL;
                    $jobdescreate_penga->save();
                }
            }else{
                echo "";
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
            }else{
                echo "";
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
            }else{
                echo "";
            }
            
            if($request->fisik){
                
                $count_fisik = count($request->fisik);

                for ($i=0; $i < $count_fisik; $i++) { 
                    $jobdescreate_fisik = new jobdescreate_fisik();
                    $jobdescreate_fisik->jobdescreate_id = $data_id->id;
                    $jobdescreate_fisik->id_persyaratan = isset($request->fisik[$i])?$request->fisik[$i]:'';
                    $jobdescreate_fisik->save();
                }
            }else{
                echo "";
            }
            
            return redirect('/AdminAnalystOD/listjobdescreate')->with('status', 'Berhasil di Simpan');
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
    public function cetakpdf($id){
        //$data['id']=$id;
        //dd($data['id']);
        //$pdf = PDF::loadView('pos.AdminAnalystOD.otorisasiAdminAnalystOD.jobpdf', $data);
        //return $pdf->download('jobdescpdf.pdf');
        $jobres     =[];
        $unit       =[];
        $tools      =[];
        $mat        =[];
        $co         =[];
        $pen        =[];
        $ker        =[];
        $profil     =[];
        $profil_d   =[];
        $fisik      =[];
         $data = jobdescreate::where('jobdescreate.id',$id)
         ->join('job', 'jobdescreate.id', '=', 'job.jobdescreate_id')
         ->select('jobdescreate.*', 'job.jabatanatasanlangsung')
         ->get();
        $job = job::where('jobdescreate_id',$id)
        ->get();
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
        $fisik      = jobdescreate_fisik::where('jobdescreate_id',$id)->get();
        $profil     = profil::where('jobdescreate_id',$id)->get();
        $profil_d     = profil_detail::where('jobdescreate_id',$id)->get();
        $no =1;

        $datajob['data']  =$data;
        $datajob['job']   =$job;
        $datajob['jobres']=$jobres;
        $datajob['unit']  =$unit;
        $datajob['tools'] =$tools;
        $datajob['mat']   =$mat;
        $datajob['co']    =$co;
        $datajob['pen']   =$pen;
        $datajob['ker']   =$ker;
        $datajob['fisik'] =$fisik;
        $datajob['profil']=$profil;
        $datajob['profil_d']=$profil_d;
        $datajob['no']=$no;
         
         $pdf = PDF::loadView('pos.AdminAnalystOD.otorisasiAdminAnalystOD.jobpdf', $datajob);
         return $pdf->download('jobdescpdf.pdf');
    }
    public function pdf($id)
    {
        // $data['id']=$id;
        // $pdf = PDF::loadView('pos.AdminAnalystOD.otorisasiAdminAnalystOD.jobpdf', $data);
        // return $pdf->download('jobdescpdf.pdf');

        $jobres     =[];
        $unit       =[];
        $tools      =[];
        $mat        =[];
        $co         =[];
        $pen        =[];
        $ker        =[];
        $profil     =[];
        $profil_d   =[];
        $fisik      =[];
        $data = jobdescreate::where('jobdescreate.id',$id)
        ->join('job', 'jobdescreate.id', '=', 'job.jobdescreate_id')
        ->select('jobdescreate.*', 'job.jabatanatasanlangsung')
        ->get();
        $job = job::where('jobdescreate_id',$id)
        ->get();
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
        $fisik      = jobdescreate_fisik::where('jobdescreate_id',$id)->get();
        $profil     = profil::where('jobdescreate_id',$id)->get();
        $profil_d     = profil_detail::where('jobdescreate_id',$id)->get();
        $no =1;

        // // //dd($job);
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.pdf', [ 'data' => $data,'job'=>$job,'jobres'=>$jobres,'unit'=>$unit,'tools'=>$tools,'mat'=>$mat,'co'=>$co,'pen'=>$pen,'ker'=>$ker,'profil'=>$profil,'profil_d'=>$profil_d,'fisik'=>$fisik,'no'=>$no,'id'=>$id]);
        // $datajob['data']  =$data;
        // $datajob['job']   =$job;
        // $datajob['jobres']=$jobres;
        // $datajob['unit']  =$unit;
        // $datajob['tools'] =$tools;
        // $datajob['mat']   =$mat;
        // $datajob['co']    =$co;
        // $datajob['pen']   =$pen;
        // $datajob['ker']   =$ker;
        // $datajob['fisik'] =$fisik;
        // $datajob['profil']=$profil;
        // $datajob['profil_d']=$profil_d;
        // $datajob['no']=$no;


        // $pdf = PDF::loadView('pos.AdminAnalystOD.otorisasiAdminAnalystOD.pdf', $datajob);
        // return $pdf->download('jobdescpdf.pdf');
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
        return $ret;
    } 
    public function Workinternal (Request $request) 
    {   

        // $arr = [];
        // $ret = [];
        // $data = structdisp::where('emp_cskt_ltext','like','%'.$request->q.'%')->get();
        // foreach ($data as $key => $value) {
        //     array_push($arr,['id'=>$value->emp_cskt_ltext,'text'=>$value->emp_cskt_ltext] );
        // }
        // $ret  = ['results' => $arr];
        // return $ret;
        $arr = [];
        $ret = [];
        //$ret = file_get_contents('https://portal.krakatausteel.com/eos/api/organization/level');
        $ret = file_get_contents('https://portal.krakatausteel.com/eos/api/organization/level', false, stream_context_create($this->arrContextOptions));
        $jess=json_decode($ret);
        $collection = collect($jess);

        $filtered = $collection->filter(function ($value, $key) use ($request) {
            return str_is('*'.strtolower($request->q).'*', strtolower($value->Objectname) );
        });
        
        $x = $filtered->all();

        foreach ($x as $key => $value) {
            array_push($arr,['id'=>$value->Objectname, 'text'=>$value->Objectname]);
        }
        $ret = ['results' =>
        $arr];
        
        // preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr ];
        return $ret;
    } 

    public function perfisik (Request $request)
    {   
        $arr = [];
        $ret = [];
        $data = persyaratan_fisik::where('persyaratan','like','%'.$request->q.'%')->get();
        // dd($data)
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->persyaratan,'text'=>$value->persyaratan.""] );
        }
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
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
        $arr ];
        return $ret;
    } 

    public function namaUserApi (Request $request,$id)
    {   
        $arr = [];
        $ret = [];
        //$ret = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/shortAbbrOrg/'.$id);
        $ret = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/shortAbbrOrg/'.$id, false, stream_context_create($this->arrContextOptions));
        $jess=json_decode($ret);
        $collection = collect($jess);

        $filtered = $collection->filter(function ($value, $key) use ($request) {
            return str_is('*'.strtolower($request->q).'*', strtolower($value->empname) );
        });
        
        $x = $filtered->all();

        foreach ($x as $key => $value) {
            array_push($arr,['id'=>$value->empnik.'-'.$value->empname.'-'.$value->emppostx, 'text'=>$value->empnik.'-'.$value->empname." (".$value->emppostx.") "]);
        }
        $ret = ['results' =>
        $arr];
        
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
        $ret  = ['results' => $arr];
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
        $ret  = ['results' => $arr];
        return $ret;
    } 
    
    public function AbbrPosition (Request $request)
    {   
        $arr = [];
        $ret = [];
        //$ret = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0007');
        $ret = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0007', false, stream_context_create($this->arrContextOptions));
        $jess=json_decode($ret);
        $collection = collect($jess);
        $filtered = $collection->filter(function ($value, $key) use ($request) {
            return str_is('*'.strtolower($request->q).'*', strtolower($value->AbbrPosition) );
        });
        
        $x = $filtered->all();

        foreach ($x as $key => $value) {
            array_push($arr,['id'=>$value->AbbrPosition,'abbrUnit'=>$value->AbbrOrgUnitDivisi, 'text'=>$value->AbbrPosition." (".$value->NameofPosition.") "]);
        }
        $ret = ['results' =>
        $arr];
        
        
        //dd($collection);
        // $data = ZHROM0007::where('AbbrPosition','like','%'.$request->q.'%')->get();
        // foreach ($data as $key => $value) {
        //     array_push($arr,['id'=>$value->AbbrPosition,'abbrUnit'=>$value->AbbrOrgUnitDivisi,'text'=>$value->AbbrPosition." (".$value->NameofPosition.") "] );
        // }
        // $ret  = ['results' => $arr];
         return $ret;
    } 

    public function getjab ($jabatan)
    {   
        //   $data = ZHROM0007::where('AbbrPosition', $jabatan)
        //   ->groupBy('AbbrPosition')
        //   ->first();
        //$data = [];
        //$data    = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0007/AbbrPosition/'.$jabatan);
        $data = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0007/AbbrPosition/'.$jabatan, false, stream_context_create($this->arrContextOptions));
        $jessdata   =json_decode($data); 
        $collection = collect($jessdata);
        //dd($data);    
        return $collection;
    }

    public function nojabatan (Request $request,$kode = null)
    {   
        // $arr = [];
        // $ret = [];
        // $data = zhrom0013::where('jabatanatasanlangsung','like','%'.$request->q.'%')
        //         ->where('nojabatan',$kode)
        //         ->get();
        // return $data;
        //$data    = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0013/nojabatan/'.$kode);
        $data = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0013/nojabatan/'.$kode, false, stream_context_create($this->arrContextOptions));
        $jessdata   =json_decode($data); 
        $collection = collect($jessdata);
        //dd($data);    
        return $collection;
    } 

    public function detail ($un)
    {   
        // $data = zhrom0012::where('nojabatan', $un)
        // ->groupBy('nojabatan')
        // ->first();       
        // return $data;
        //$data    = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0012/nojabatan/'.$un);
        $data = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0012/nojabatan/'.$un, false, stream_context_create($this->arrContextOptions));
        $jessdata   =json_decode($data); 
        $collection = collect($jessdata);
        //dd($collection);    
        return $collection;
        
    }

    public function abbdetail (Request $request,$kode = null)
    {   
        // $arr = [];
        // $ret = [];
        // $data = zhrom0012::where('namakompetensi','like','%'.$request->q.'%')
        //         ->where('nojabatan',$kode)
        //         ->groupBy('namakompetensi')
        //         ->get();
        // return $data;
        //$data    = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0012/nojabatan/'.$kode);
        $data = file_get_contents('https://portal.krakatausteel.com/eos/api/zhrom0012/nojabatan/'.$kode, false, stream_context_create($this->arrContextOptions));
        $jessdata   =json_decode($data); 
        $collection = collect($jessdata);
        //dd($data);    
        return $collection;
    } 


    public function konfirmasi($id)
    {   
        $datajob = jobdescreate::where('id',$id)->get();
        //dd($datajob[0]->nikanalis);
        //$jobdescreate = jobdescreate::where('id',$id)->update(['verifikasi' => 'yes']);    
        $jobdescreate = jobdescreate::where('id',$id)->update(['approveanalis' => '1','tglapproveanalis' => date("Y-m-d H:i:s"),'posisiprogress'=>1]);    
        
        
        if($jobdescreate){
            //$data_id = jobdescreate::where('id',$id)->get();

            $app_h = new Approval_h();
            $app_h->jobdescreate_id = $datajob[0]->id;
            $app_h->nik = $datajob[0]->nikanalis;
            $app_h->nama =$datajob[0]->analis;
            $app_h->sebagai ='Analis';
            $app_h->waktu =date('Y-m-d H:i:s');
            $app_h->save();

            $hsl='success';
            return $hsl;
        }
        return Redirect::back()->withErrors(['msg', 'Error']);
    } 
    public function kadaluarsa($id)
    {   
        //dd($id);
        //$jobdescreate = jobdescreate::where('id',$id)->update(['verifikasi' => 'yes']);    
        $jobdescreate = jobdescreate::where('id',$id)->update(['posisiprogress' => '4','tglkadaluarsa' => date("Y-m-d H:i:s")]);    
        
        
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
        $ret  = ['results' => $arr ];
        return $ret;
    } 

    public function edit(Request $request, $id)
    {
        $jobres     =[];
        $unit       =[];
        $tools      =[];
        $mat        =[];
        $fisik      =[];
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
        $fisik      = jobdescreate_fisik::where('jobdescreate_id',$id)->get();
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.editjobdescreate',['item'=>$item,
        'jobres'=>$jobres,'unit'=>$unit,'tools'=>$tools,'mat'=>$mat,'co'=>$co,'pen'=>$pen,'ker'=>$ker,'id'=>$id,'fisik'=>$fisik]);
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
        $fisik      =[];
        $jobres = jobdescreate_res::where('jobdescreate_id',$id)
                    ->join('kata_kerja', 'jobdescreate_res.id_kata_kerja', '=', 'kata_kerja.id')
                    ->join('matrikindikator', 'jobdescreate_res.id_met_object', '=', 'matrikindikator.id')
                    ->select('jobdescreate_res.*', 'kata_kerja.keterangan', 'matrikindikator.object','matrikindikator.indikator')
                    ->get();
        // ini buat jon table
        // dd($jobres);
        $fisik      = jobdescreate_fisik::where('jobdescreate_id',$id)->get();
        $tools      = jobdescreate_tools::where('jobdescreate_id',$id)->get();
        $mat        = jobdescreate_materials::where('jobdescreate_id',$id)->get();
        $unit       = jobdescreate_unitkerja::where('jobdescreate_id',$id)->get();
        $co         = jobdescreate_conditions::where('jobdescreate_id',$id)->get();
        $pen        = jobdescreate_pen::where('jobdescreate_id',$id)->get();
        $ker        = jobdescreate_penga::where('jobdescreate_id',$id)->get();
        $profil     = profil::where('jobdescreate_id',$id)->get();
        $item       = jobdescreate::where('id',$id)->get();
        $profil_d   = profil_detail::where('jobdescreate_id',$id)->get();
        $job        = job::where('jobdescreate_id',$id)->get();
        $data       = array('item'=>$item,'job'=>$job,'jobres'=>$jobres,'unit'=>$unit,'fisik'=>$fisik,'tools'=>$tools,'mat'=>$mat,'co'=>$co,'pen'=>$pen,'ker'=>$ker,'profil'=>$profil,'profil_d'=>$profil_d);
        return $data;
    }
    public function showhistoryapproval(Request $request,$id){
        
        $return = [];
        $history = Approval_h::where('jobdescreate_id',$id)->get();
        foreach($history as $key => $value){
            array_push($return,
            array(
            'no'=>$key+1,
            'nik'=>$value->nik,
            'nama'=>$value->nama,
            'sebagai'=>$value->sebagai,
            'waktu'=>$value->waktu
            )
            
        
        );

        }
        
        return array('data'=>$return);

    }
}