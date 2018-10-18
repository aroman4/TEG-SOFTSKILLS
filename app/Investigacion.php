<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    //
    protected $table = 'investigacion';
    protected $fillable = ['id_solic','actividades','caracteristica','titulo','archivo'];
    
    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
}
