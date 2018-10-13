<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['respuesta'];
    protected $table = 'respuesta';

    public function cuestionario(){
        return $this->belongsTo('App\Cuestionario');
    }
    public function pregunta(){
        return $this->belongsTo('App\Pregunta');
    }
}
