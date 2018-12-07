<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class structdisp extends Model
{
    protected $table = 'structdisp';
    // public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User','userid','empnik');
    }
}
