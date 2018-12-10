<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportefinalaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportefinalase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asesoria');
            $table->string('texto',1000);
            $table->string('archivo')->nullable();
            $table->boolean('enviar')->default(false);
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
        Schema::dropIfExists('reportefinalase');
    }
}
