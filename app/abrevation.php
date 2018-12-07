<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abrevation extends Model
{
    protected $table = 'abrevation';

    public function abrevation_detail()
    {
        return $this->hasMany('App\abrevation_detail');
    }
}
