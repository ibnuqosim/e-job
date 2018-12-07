<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class downloadPDF extends Model
{
    protected $fillable = ['no','street_address','zip_code','city'];
}
