<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    //postulacion
    protected $table = 'postulacion';
    protected $fillable = ['otros_proyectos','user_id', 'aporte','actividad','tituloinv','estado','archivo', 'nombre_inv', 'id_post', 'estadoinv', 'archivo_inv'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
    
}
