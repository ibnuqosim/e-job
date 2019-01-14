<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobdescreate_res extends Model
{
    protected $table = 'jobdescreate_res';
    public function jobdescreate_res()
    {
        return $this->belongsTo('App\jobdescreate_res','jobdescreate_id','id');
    }
    public function matrikinndikator()
    {
        return $this->belongsTo('App\matrikindikator','id_kata_kerja','id');
    }
}
