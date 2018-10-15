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
        'nombre_usu', 'email', 'password','tipo_usu','edad','nombre','apellido','telefono','direccion','pais','profesion','sexo','cedula',
    ];

    /**
    * Hash the password whenever it is updated.
    *
    * @param $value
    * @return string
    */
    /* public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    } */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function solicitudes(){
        return $this->hasMany('App\Solicitud');
    }
    public function asesoria(){
        return $this->hasMany('App\Asesoria');
    }
    public function pregunta() {
        return $this->hasMany('App\Pregunta');
    }
    public function messages() {
        return $this->hasMany('App\Message');
    }
}
