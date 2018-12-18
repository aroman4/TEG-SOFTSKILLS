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
            $table->string('objetivogeneral')->nullable();
            $table->string('objetivosespecificos')->nullable();
            $table->string('actividades')->nullable();
            $table->string('objetivos')->nullable();
            $table->string('descripcion',1000)->nullable();
            $table->string('titulo')->nullable();
            $table->string('caracteristica')->nullable();
            $table->string('asunto')->nullable();
            $table->string('mensaje',1000)->nullable();
            $table->string('actividad')->nullable();
            $table->string('otros_proyectos')->nullable();
            $table->string('aporte')->nullable();
            $table->string('archivo')->nullable();
            $table->enum('estado', ['pendiente', 'aceptada','rechazada'])->default('pendiente');
            $table->enum('tipo', ['normal', 'presolicitud','asesor'])->default('normal');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('otros')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('votoscomite')->default(0);            
            $table->integer('votosfavor')->default(0);
            $table->integer('votoscontra')->default(0);

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
