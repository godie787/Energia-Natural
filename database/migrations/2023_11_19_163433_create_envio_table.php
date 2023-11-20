<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvioTable extends Migration
{
    public function up()
    {
        Schema::create('envio', function (Blueprint $table) {
            $table->unsignedBigInteger('num_envio');
            $table->unsignedBigInteger('id_courrier');
            $table->date('fecha');
            $table->string('direccion_despacho', 50);
            $table->timestamps();

            // Definir la clave primaria compuesta
            $table->primary(['num_envio', 'id_courrier']);

            $table->foreign('id_courrier')->references('id_courrier')->on('courrier');
        });
    }

    public function down()
    {
        Schema::dropIfExists('envio');
    }
}