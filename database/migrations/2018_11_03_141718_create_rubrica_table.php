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
            $table->boolean('respondidoa')->default(false);
            $table->boolean('respondidoc')->default(false);
            $table->boolean('enviar')->default(false);
            $table->boolean('predefinido')->default(false);
            $table->enum('columnas', ['3', '4','5'])->default('3');
            $table->enum('filas', ['2','3', '4','5','6'])->default('3');
            //criterios, columna izquierda
            $table->string('criterio0')->nullable();
            $table->string('criterio1')->nullable();
            $table->string('criterio2')->nullable();
            $table->string('criterio3')->nullable();
            $table->string('criterio4')->nullable();
            $table->string('criterio5')->nullable();
            //descripciones evaluaciones
            $table->string('evaluacion0')->nullable();
            $table->string('evaluacion1')->nullable();
            $table->string('evaluacion2')->nullable();
            $table->string('evaluacion3')->nullable();
            $table->string('evaluacion4')->nullable();
            //respuestas asesor
            $table->float('respuestaa0')->nullable();
            $table->float('respuestaa1')->nullable();
            $table->float('respuestaa2')->nullable();
            $table->float('respuestaa3')->nullable();
            $table->float('respuestaa4')->nullable();
            $table->float('respuestaa5')->nullable();
            //respuestas cliente
            $table->float('respuestac0')->nullable();
            $table->float('respuestac1')->nullable();
            $table->float('respuestac2')->nullable();
            $table->float('respuestac3')->nullable();
            $table->float('respuestac4')->nullable();
            $table->float('respuestac5')->nullable();
            //totales de cada fila asesor
            $table->float('total0a')->nullable();
            $table->float('total1a')->nullable();
            $table->float('total2a')->nullable();
            $table->float('total3a')->nullable();
            $table->float('total4a')->nullable();
            $table->float('total5a')->nullable();
            $table->float('totala')->nullable(); //total rubrica
            //totales de cada fila cliente
            $table->float('total0c')->nullable();
            $table->float('total1c')->nullable();
            $table->float('total2c')->nullable();
            $table->float('total3c')->nullable();
            $table->float('total4c')->nullable();
            $table->float('total5c')->nullable();
            $table->float('totalc')->nullable(); //total rubrica            
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
