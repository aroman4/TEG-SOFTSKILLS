<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = 'solicitud';
    protected $fillable = ['nombre_solicitud', 'actividades','descripcion', 'titulo', 'caracteristica', 'asunto', 'mensaje', 'user_id'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}
