<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('caracteristica')->nullable();
            $table->string('actividades')->nullable();
            $table->string('descripcion')->nullable();//nueva
            $table->string('archivofinal')->nullable();//nueva
            $table->string('tipo_inv')->nullable();//nombre del investigador 
            $table->integer('id_solic')->nullable();
            $table->enum('estado', ['activa', 'finalizada'])->default('activa');
            $table->integer('cantidad')->nullable();
            $table->timestamps();

            //clave foranea id de usuario
            $table->integer('user_id')->unsigned(); //id del investigador
            $table->foreign('user_id')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigacion');
    }
}
