<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_solicitud')->nullable();
            $table->string('actividades')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('titulo')->nullable();
            $table->string('caracteristica')->nullable();
            $table->string('asunto')->nullable();
            $table->string('mensaje')->nullable();
            $table->string('opinion')->nullable();
            $table->string('otros_proyectos')->nullable();
            $table->string('aporte')->nullable();
<<<<<<< HEAD
=======
            $table->string('archivo')->nullable();
>>>>>>> 387b1d3387a430efa46fc90c0fca44b5122c0555

            //clave foranea id de usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
}
