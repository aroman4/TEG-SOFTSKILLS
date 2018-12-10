<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_usu');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('tipo_usu', ['investigador', 'asesor','admin','cliente', 'usuario'])->default('investigador');
            $table->enum('tipo_inv', ['normal', 'lider','comite'])->default('normal');
            $table->integer('edad')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('organizacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('profesion')->nullable();
            $table->string('sexo')->nullable();
            $table->boolean('votoejercido')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('usuario');
    }
}
