<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta');
            $table->bigInteger('id_admin_rut')->unsigned();
            $table->bigInteger('id_cliente_rut')->unsigned();
            $table->date('fecha');
            $table->decimal('total', 8, 2);
            $table->char('estado', 1);
            $table->unsignedBigInteger('num_envio');
            $table->unsignedBigInteger('id_courrier');
            $table->timestamps();

            $table->foreign('id_admin_rut')->references('rut')->on('usuario');
            $table->foreign('id_cliente_rut')->references('rut')->on('usuario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
