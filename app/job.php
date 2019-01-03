<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $table = 'job';

    public function jobdescreate()
    {
        return $this->belongsTo('App\jobdescreate','jobdescreate_id','id','jabatanbawahanlangsung');
    }
}
