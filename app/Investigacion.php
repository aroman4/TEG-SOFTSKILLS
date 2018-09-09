<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    //
    protected $table = 'investigacion';
    protected $fillable = ['nombre_inv','codigo_inv'];
}
