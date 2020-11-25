<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postaisyiyah extends Model
{
    protected $table = "postaisyiyah";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
