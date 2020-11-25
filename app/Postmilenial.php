<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postmilenial extends Model
{
    protected $table = "postmilenial";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
