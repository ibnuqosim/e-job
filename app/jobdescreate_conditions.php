<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobdescreate_conditions extends Model
{
    protected $table = 'jobdescreate_conditions';

    public function jobdescreate_conditions()
    {
        return $this->belongsTo('App\jobdescreate_conditions','id','lavel','unitkerja','kodeunit','object','indikator','kewenangan');
    }
}
