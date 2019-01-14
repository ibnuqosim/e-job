<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matrikindikator extends Model
{
    protected $table = 'matrikindikator';

    public function matrikindikator()
    {
        return $this->hasMany('App\jobdescreate_res','id','id_kata_kerja');
    }
}
