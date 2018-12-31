<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\history_pesan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$role = Auth::user()->hasRole();
       // $admin = new Role();
        //print_r($admin);
        $koreksi = history_pesan::where('nikanalis',Auth::user()->userid)
        ->where('status',0)
        ->count();
        $data=['koreksi'=>$koreksi];
        return view('layouts.profil',$data);
    }
}
