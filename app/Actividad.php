<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = 'actividad';
    protected $fillable = ['id','fecha_entrega','titulo','id_investigador','id_postulacion','id_investigacion','archivo_actividad','estado_actividad','estado_Resput','observacion'];
    /* public function investigacion(){
        return $this->belongsTo('App\Investigacion','id_investigacion');
    } */
}