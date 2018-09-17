<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_usu', 'email', 'clave_usu','tipo_usu','edad','nombre','apellido','telefono','direccion','pais','profesion','sexo','cedula',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'clave_usu', 'remember_token',
    ];

    public function solicitudes(){
        return $this->hasMany('App\Solicitud');
    }
}
