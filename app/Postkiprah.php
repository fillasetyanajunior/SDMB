<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postkiprah extends Model
{
    protected $table = "postkiprah";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
