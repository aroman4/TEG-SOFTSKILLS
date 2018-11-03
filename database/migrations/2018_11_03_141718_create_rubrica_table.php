<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubrica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('user_id')->unsigned()->index(); //id del asesor
            $table->integer('cliente_id');
            $table->string('descripcion');
            $table->integer('id_asesoria')->nullable();
            $table->boolean('respondido')->default(false);
            $table->enum('columnas', ['3', '4','5'])->default('3');
            $table->enum('filas', ['3', '4','5','6'])->default('3');
            $table->string('criterio0')->nullable();
            $table->string('criterio1')->nullable();
            $table->string('criterio2')->nullable();
            $table->string('criterio3')->nullable();
            $table->string('criterio4')->nullable();
            $table->string('criterio5')->nullable();
            $table->string('evaluacion0')->nullable();
            $table->string('evaluacion1')->nullable();
            $table->string('evaluacion2')->nullable();
            $table->string('evaluacion3')->nullable();
            $table->string('evaluacion4')->nullable();
            $table->integer('porcentaje0')->nullable();
            $table->integer('porcentaje1')->nullable();
            $table->integer('porcentaje2')->nullable();
            $table->integer('porcentaje3')->nullable();
            $table->integer('porcentaje4')->nullable();
            $table->integer('porcentaje5')->nullable();
            $table->string('respuesta0')->nullable();
            $table->string('respuesta1')->nullable();
            $table->string('respuesta2')->nullable();
            $table->string('respuesta3')->nullable();
            $table->string('respuesta4')->nullable();
            $table->string('respuesta5')->nullable();
            //6 filas, 5 columnas maximo
            $table->string('celda00')->nullable();
            $table->string('celda01')->nullable();
            $table->string('celda02')->nullable();
            $table->string('celda03')->nullable();
            $table->string('celda04')->nullable();
            $table->string('celda10')->nullable();
            $table->string('celda11')->nullable();
            $table->string('celda12')->nullable();
            $table->string('celda13')->nullable();
            $table->string('celda14')->nullable();
            $table->string('celda20')->nullable();
            $table->string('celda21')->nullable();
            $table->string('celda22')->nullable();
            $table->string('celda23')->nullable();
            $table->string('celda24')->nullable();
            $table->string('celda30')->nullable();
            $table->string('celda31')->nullable();
            $table->string('celda32')->nullable();
            $table->string('celda33')->nullable();
            $table->string('celda34')->nullable();
            $table->string('celda40')->nullable();
            $table->string('celda41')->nullable();
            $table->string('celda42')->nullable();
            $table->string('celda43')->nullable();
            $table->string('celda44')->nullable();
            $table->string('celda50')->nullable();
            $table->string('celda51')->nullable();
            $table->string('celda52')->nullable();
            $table->string('celda53')->nullable();
            $table->string('celda54')->nullable();
            $table->string('celda60')->nullable();
            $table->string('celda61')->nullable();
            $table->string('celda62')->nullable();
            $table->string('celda63')->nullable();
            $table->string('celda64')->nullable();
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
        Schema::dropIfExists('rubrica');
    }
}
