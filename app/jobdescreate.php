<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobdescreate extends Model
{
    protected $table = 'jobdescreate';
    protected $fillable = [
        'no_jabatan',
        'name_jabatan',
        'gol_jabatan',
    ];

    public function job()
    {
        return $this->hasMany('App\job','jobdescreate_id','id');
    }

    public function jobdescreate_res()
    {
        return $this->hasMany('App\jobdescreate_res','jobdescreate_id','id');
    }

    public function matrikindikator()
    {
        return $this->hasMany('App\matrikindikator','id');
    }
}