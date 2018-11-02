<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_investg')->nullable();
            $table->integer('id_creador')->nullable();
            $table->string('pregunta1')->nullable();
            $table->enum('pregunta2', ['Si', 'No','Normal'])->default('Normal');
            $table->string('pregunta3')->nullable();
            $table->enum('pregunta4', ['Positiva', 'Negativo','Ninguna'])->default('Ninguna');
            $table->string('pregunta5')->nullable();
            $table->string('pregunta6')->nullable();
            $table->integer('calificacion')->nullable();
            $table->integer('id_usuario')->unsigned(); //id del usuario 
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
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
        Schema::dropIfExists('encuesta');
    }
}
