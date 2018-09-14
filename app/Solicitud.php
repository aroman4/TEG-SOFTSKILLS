<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = 'solicitud';
    protected $fillable = ['nombre_solicitud', 'actividades','descripcion', 'user_id'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}
