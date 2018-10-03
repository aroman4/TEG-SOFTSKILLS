<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['titulo','tipo_pregunta','opcion','user_id'];
    protected $casts = ['opcion' => 'array',];
    protected $table = 'pregunta';
    //
    public function cuestionario(){
        return $this->belongsTo('App\Cuestionario');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function respuesta(){
        return $this->hasMany('App\Respuesta');
    }
}
