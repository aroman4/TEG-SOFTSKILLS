<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $fillable = ['titulo','descripcion','user_id','id_asesoria'];
    protected $dates = ['deleted_at'];
    protected $table = 'cuestionario';
    //
    public function pregunta(){
        return $this->hasMany('App\Pregunta');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function respuesta(){
        return $this->hasMany('App\Respuesta');
    }
}
