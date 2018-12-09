<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    //
    protected $table = 'investigacion';
    protected $fillable = ['puntuacion','estado_com','votoscomite','votosfavor','votoscontra','id_solic','actividades','caracteristica','titulo','archivo', 'estado', 'archivofinal', 'descripcion', 'objetivos'];
    
    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}
