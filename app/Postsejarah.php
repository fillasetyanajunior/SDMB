<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postsejarah extends Model
{
    protected $table = "postsejarah";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
