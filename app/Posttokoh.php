<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttokoh extends Model
{
    protected $table = "posttokoh";
    protected $fillable = [
        'nama','caption','foto'
    ];
}
