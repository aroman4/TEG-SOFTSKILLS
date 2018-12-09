<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulacion', function (Blueprint $table) {
                $table->increments('id');
                $table->string('actividad')->nullable();
                $table->string('otros_proyectos')->nullable();
                $table->string('aporte')->nullable();
                $table->string('archivo')->nullable();
                $table->string('tituloinv')->nullable();
                $table->string('nombre_inv')->nullable();
                $table->enum('estado', ['pendiente', 'aceptada','rechazada'])->default('pendiente');
                $table->integer('id_post')->nullable();
                $table->enum('estado_inv', ['inicio', 'finalizado'])->default('inicio');
                $table->string('archivo_inv')->nullable();
                $table->string('archivof')->nullable();
                $table->enum('estado_c', ['pendiente', 'aceptada','rechazada'])->default('pendiente');
                $table->string('resumen1', 500)->nullable();
                $table->string('resumen2',500)->nullable();
                //clave foranea id de usuario y investigacion
                $table->integer('id_invest')->unsigned(); //id del usuario 
                $table->foreign('id_invest')->references('id')->on('usuario')->onDelete('cascade');
                $table->boolean('deafuera')->default(false);
                $table->string('nombre')->nullable();
                $table->string('apellido')->nullable();
                $table->string('email')->nullable();
                $table->string('otros')->nullable();
                $table->string('telefono')->nullable();
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
        Schema::dropIfExists('postulacion');
    }
}
