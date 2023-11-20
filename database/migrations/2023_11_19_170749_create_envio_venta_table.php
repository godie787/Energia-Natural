<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvioVentaTable extends Migration
{
    public function up()
    {
        Schema::create('envio_venta', function (Blueprint $table) {
            $table->id('id_envio_venta');
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('num_envio');
            $table->timestamps();

            $table->foreign('id_venta')->references('id_venta')->on('venta');
            $table->foreign('num_envio')->references('num_envio')->on('envio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('envio_venta');
    }
}
