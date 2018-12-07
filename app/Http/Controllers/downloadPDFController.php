<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\structdir;

class downloadPDFController extends Controller
{
    public function index(){

        // $users = structdir::all();
        
        // // return view('index', compact('users'));
        // return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.downloadPDF',$data);


        $tj = structdir::all();
        $data = ['structdir'=>'test','tj'=>$tj];
        // var_dump($tj);
        // return view('AdminAnalystOD.downloadPDF',$data);
        return view('pos.AdminAnalystOD.otorisasiAdminAnalystOD.downloadPDF', compact('data'));
      }


      public function downloadPDF($id){
        $tj = structdir::find($id);
  
        $pdf = PDF::loadView('pdf', compact('tj'));
        return $pdf->download('invoice.pdf');
  
      }
}


