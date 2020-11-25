<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postsaudagar extends Model
{
    protected $table = "postsaudagar";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
