<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    //postulacion
    protected $table = 'postulacion';
    protected $fillable = ['estado_c','resumen1','resumen2','archivof','otros_proyectos','user_id', 'aporte','actividad','tituloinv','estado','archivo', 'nombre_inv', 'id_post', 'estadoinv', 'archivo_inv','deafuera','nombre','apellido','email','otros','telefono'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
    
}