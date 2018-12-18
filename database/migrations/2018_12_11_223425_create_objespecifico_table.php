<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjespecificoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objespecifico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->integer('id_solicitud')->nullable();
            $table->integer('id_investigacion')->nullable();
            $table->string('actividades')->nullable();
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
        Schema::dropIfExists('objespecifico');
    }
}
