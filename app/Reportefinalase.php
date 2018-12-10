<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportefinalase extends Model
{
    protected $table = 'reportefinalase';
    protected $fillable = ['id_asesoria','texto','archivo','enviar'];
}
