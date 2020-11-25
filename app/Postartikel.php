<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postartikel extends Model
{
    protected $table = "postartikel";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
