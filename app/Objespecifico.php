<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objespecifico extends Model
{
    protected $table = 'objespecifico';
    protected $fillable = ['titulo','id_solicitud','id_investigacion','actividades'];

    /* public function actividad(){
        return $this->hasMany('App\Actividad');
    } */
}
