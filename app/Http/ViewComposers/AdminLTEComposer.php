<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\history_pesan;
use Illuminate\Support\Facades\Auth; 

class AdminLTEComposer
{

    protected $historypesan;

    public function __construct()
    {
        $user = Auth::user();
        
        $this->historypesan = history_pesan::where('nik',$user->userid)->get();
    }

    public function compose(View $view)
    {
        $view->with('histo', $this->historypesan->count());
    }
}