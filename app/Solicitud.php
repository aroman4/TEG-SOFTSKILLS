<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = 'solicitud';
    protected $fillable = ['nombre_solicitud', 'actividades','descripcion'];

    public function usuario(){
        return $this->belongsTo('App\User');
    }
}
