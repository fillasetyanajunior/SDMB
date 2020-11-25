<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postseni extends Model
{
    protected $table = "postseni";
    protected $fillable = [
        'judul','caption','foto'
    ];
}
