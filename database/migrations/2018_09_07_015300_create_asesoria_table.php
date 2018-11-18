<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsesoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesoria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente'); //id del cliente que creó la solicitud
            $table->string('titulo')->nullable();
            $table->string('mensaje')->nullable();
            $table->string('archivo')->nullable();
            $table->integer('reporte_id')->nullable();
            $table->enum('estado', ['activa', 'finalizada'])->default('activa');
            $table->timestamps();

            //clave foranea id de usuario
            $table->integer('user_id')->unsigned(); //id del asesor
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
        Schema::dropIfExists('asesoria');
    }
}
