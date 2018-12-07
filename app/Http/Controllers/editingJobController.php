<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editingJobController extends Controller
{
    public function index(Request $request)
    {
        $data = ['data'=>'test'];
        return view('pos.editing_job',$data);
    }
}
