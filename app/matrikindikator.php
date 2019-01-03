<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matrikindikator extends Model
{
    protected $table = 'matrikindikator';

    public function matrikindikator()
    {
        return $this->belongsTo('App\matrikindikator','id','lavel','unitkerja','kodeunit','object');
    }
}
