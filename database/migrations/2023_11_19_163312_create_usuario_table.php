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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('rut');
            $table->tinyInteger('rol')->unsigned()->default(1);
            $table->string('nom_usuario', 30);
            $table->string('nombre', 100);
            $table->string('apellido', 80);
            $table->string('fono', 20)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->string('correo', 100);
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();

            //para definir el rut como unico:
            $table->unique('rut');
            //definir rol con valores unicos

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
