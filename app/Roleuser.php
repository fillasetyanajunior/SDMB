<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roleuser extends Model
{
    protected $fillable = ['role_id'];
    protected $table = 'role_users';
}
