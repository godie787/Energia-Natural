<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            // Definir la clave primaria compuesta
            $table->primary(['id_venta', 'id_producto']);

            // Definir las claves foráneas
            $table->foreign('id_venta')->references('id_venta')->on('venta')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('producto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
