<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobdescreate_unitkerja extends Model
{
    protected $table = 'jobdescreate_unitkerja';

    public function jobdescreate_unitkerja()
    {
        return $this->belongsTo('App\jobdescreate','id');
    }
}
