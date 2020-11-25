<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postinfopersyarikatan extends Model
{
    protected $table = "postinfopersyarikatan";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
