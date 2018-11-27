<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'voto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'id_sol', 'id_inv',];
}
