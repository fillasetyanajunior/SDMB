<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postkultum extends Model
{
    protected $table = "postkultum";
    protected $fillable = [
        'judul','caption','link','foto',
    ];
}
