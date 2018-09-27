<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    protected $table = 'asesoria';
    protected $fillable = ['titulo', 'mensaje', 'user_id', 'archivo'];
    //

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}
