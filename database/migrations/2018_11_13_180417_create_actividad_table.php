<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
                $table->increments('id');
                $table->string('titulo')->nullable();
                $table->integer('id_postulacion')->nullable();
                $table->integer('id_investigacion')->nullable();
                $table->string('archivo_actividad')->nullable();
                $table->string('observacion')->nullable();
                $table->date('fecha_entrega')->nullable();
                $table->enum('estado_actividad', ['aceptado','rechazar'])->default('aceptado');
                $table->enum('estado_Resput', ['Enviadolider','enviadoinvestigador'])->default('enviadolider');
                $table->integer('id_investigador')->unsigned(); 
                $table->foreign('id_investigador')->references('id')->on('usuario')->onDelete('cascade');
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
        Schema::dropIfExists('actividad');
    }
}
