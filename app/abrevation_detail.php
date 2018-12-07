<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abrevation_detail extends Model
{
    protected $table = 'abrevation_detail';

    public function abrevation()
    {
        return $this->belongsTo('App\abrevation');
    }
}
