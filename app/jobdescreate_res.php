<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobdescreate_res extends Model
{
    protected $table = 'jobdescreate_res';
    public function jobdescreate_res()
    {
        return $this->belongsTo('App\matrikindikator','jobdescreate_id');
    }
}
