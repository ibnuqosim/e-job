<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

    public function jobdescreate_unitkerja()
    {
        return $this->hasMany('App\jobdescreate_unitkerja');
    }
    public function nikapprove()
    {
        return User::where('userid', $this->nikapprove);
    }
}