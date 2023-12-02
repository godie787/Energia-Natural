<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_producto');
            $table->unsignedBigInteger('id_categoria');
            $table->string('nom_producto',50);
            $table->string('descripcion',80);
            $table->bigInteger('rut_admin_creador')->unsigned()->nullable();
            $table->double('precio_venta', 8, 2); //cambié este campo manualmente por: double('precio_venta', 8, 2);
            $table->string('imagen')->nullable();
            $table->boolean('estado')->default(true);

            // Clave foránea a la tabla categorias
            $table->foreign('rut_admin_creador')->references('rut')->on('usuario');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
