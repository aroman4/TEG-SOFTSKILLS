<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    //postulacion
    protected $table = 'postulacion';
    protected $fillable = ['otros_proyectos', 'aporte','actividad','archivo', 'nombre_inv', 'id_post'];

    public function investigacion(){
        return $this->belongsTo('App\investigacion','id_invest');
    }
    
}
