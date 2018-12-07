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

    public function tujuan_jabatan()
    {
        return $this->belongsToMany('App\tujuan_jabatan',
        'detil_tujuan_jabatan', 
        'jobcreate_id',
        'tujuan_jabatan_id'
    );
        
    }
}