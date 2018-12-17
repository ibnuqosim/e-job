<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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



class jobdescreateController extends Controller
{
    public function index(Request $request)
    {
        $tj = jobdescreate::all();
        $data = ['jobdescreate'=>'test','tj'=>$tj,'data'=>$tj];
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

    public function store(Request $request)
    {
        // I. URAIAN JABATAN (Job Description)
        $getjab                                     = $request->getjab;
        $LvlOrg                                     = $request->LvlOrg;
        $NameofPosition                             = $request->NameofPosition;
        $NameofOrgUnitDinas                         = $request->NameofOrgUnitDinas;
        $NameofOrgUnitDivisi                        = $request->NameofOrgUnitDivisi;
        $NameofOrgUnitSubDirektorat                 = $request->NameofOrgUnitSubDirektorat;
        $NameofOrgUnitDirektorat                    = $request->NameofOrgUnitDirektorat;
        $NameofPosition                             = $request->NameofPosition;
        $AbbrOrgUnitDivisi                          = $request->AbbrOrgUnitDivisi;
        
        // II. TUJUAN JABATAN (Primary Job Role)
        $jobrole                                    = $request->jobrole;
        // IV. DIMENSI (Dimensions)
        $finansial                                  = $request->finansial;
        $nonfinansial                               = $request->nonfinansial;

        $persyaratan_fisik                          = $request->persyaratan_fisik;
        $gambar                                     = $request->gambar;
        // $uploadFile = $request->file('gambar');
        // $path = $uploadFile->store('public/files');

        $data = new jobdescreate();
        // I. URAIAN JABATAN (Job Description)
        $data->no_jabatan                           = $getjab;
        $data->name_jabatan                         = $LvlOrg;
        $data->gol_jabatan                          = $NameofPosition;
        $data->dinas                                = $NameofOrgUnitDinas;
        $data->divisi                               = $NameofOrgUnitDivisi;
        $data->subdirektorat                        = $NameofOrgUnitSubDirektorat;
        $data->direktorat                           = $NameofOrgUnitDirektorat;
        $data->pertangung                           = $NameofPosition;
        $data->directly                             = $AbbrOrgUnitDivisi;
        // II. TUJUAN JABATAN (Primary Job Role)
        $data->jobrole                              = $jobrole;
        // IV. DIMENSI (Dimensions)
        $data->finansial                            = $finansial;
        $data->nonfinansial                         = $nonfinansial;
        $data->persyaratan_fisik                    = $persyaratan_fisik;

        // $file->gambar                               = $gambar;
        $data->gambar                    = $gambar;

        
        $data->save();
        
        $data_id = jobdescreate::orderBy('id','DESC')->first();
        if($data){
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
                    // echo $jobdescreate_res->id_met_indikator;
                    // die();
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
            return redirect('/AdminAnalystOD/listjobdescreate');
        }
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
        $data = structdisp::where('emppostx','like','%'.$request->q.'%')->get();
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
        $data = structdisp::where('emppostx','like','%'.$request->q.'%')->get();
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
        $data = structdisp::where('empname','like','%'.$request->q.'%')->get();
        foreach ($data as $key => $value) {
            array_push($arr,['id'=>$value->empname,'text'=>$value->empname.""] );
        }
        $ret  = ['results' => $arr ,'pagination'=>['more'=>true]];
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
            array_push($arr,['id'=>$value->AbbrPosition,'text'=>$value->AbbrPosition.""] );
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
        $jobdescreate = jobdescreate::where('id',$id)->update(['verifikasi' => 'yes']);    
        
        if($jobdescreate){
            return back();
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

    // public function abb ($fropil)
    // {   
    //     $data = abrevation::where('abrevationno', $fropil)
    //     ->groupBy('abrevationno')
    //     ->with('abrevation_detail')
    //     ->get();

    //     // $detail = $this->abbdetail($data->id);

    //     // $ret = collect($data,$detail);
    //     return $data;
    // }
    // public function abbdetail ($detail)
    // {   
    //     $data = abrevation_detail::where('abrevation_id', $detail)
    //     ->groupBy('abrevation_id')
    //     ->get();       
    //     return $data;
    // }
}