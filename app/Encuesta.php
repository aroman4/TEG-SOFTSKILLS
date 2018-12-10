<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //
    protected $table = 'encuesta';
    protected $fillable = ['id_usuario','id_investg','id_creador','user_id','pregunta1','pregunta2', 'pregunta3', 'pregunta4', 'pregunta5','pregunta6', 'respuesta1', 'respuesta2', 'respuesta3', 'respuesta4', 'respuesta5', 'respuesta6', 'calificacion'];
    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}