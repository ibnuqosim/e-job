<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matrikindikator extends Model
{
    protected $table = 'matrikindikator';

    public function matrikindikator()
    {
        return $this->belongsTo('App\jobdescreate_res','id','lavel','unitkerja','kodeunit','object');
    }
}
