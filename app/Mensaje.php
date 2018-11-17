<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensaje';
    protected $fillable = ['id_remitente','id_destinatario','asunto','mensaje', 'archivo'];

}
