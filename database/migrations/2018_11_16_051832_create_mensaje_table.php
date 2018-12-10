<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_remitente');
            $table->integer('id_destinatario');
            $table->string('asunto');
            $table->string('mensaje',1000);
            $table->string('archivo')->nullable();
            $table->enum('estado', ['recibido', 'leido'])->default('recibido');
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
        Schema::dropIfExists('mensaje');
    }
}
