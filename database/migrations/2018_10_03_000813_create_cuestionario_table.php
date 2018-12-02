<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuestionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('user_id')->unsigned()->index(); //id del asesor
            $table->integer('cliente_id');
            $table->string('descripcion',500);
            $table->integer('id_asesoria')->unsigned()->nullable();
            $table->foreign('id_asesoria')->references('id')->on('asesoria')->onDelete('cascade');
            $table->boolean('respondido')->default(false);
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
        Schema::dropIfExists('Cuestionario');
    }
}
