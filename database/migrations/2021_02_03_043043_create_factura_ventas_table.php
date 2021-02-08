<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_ventas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->float('monto');
            $table->boolean('estado')->default('0');
            // Relación con asiento
            $table->unsignedBigInteger('asiento_id');
            $table->foreign('asiento_id')->references('id')->on('asientos')->onUpdate('cascade')->onDelete('cascade');

            // Relación con Empresa
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');

            // Relación con factura Venta
            $table->unsignedBigInteger('pedidoVenta_id');
            $table->foreign('pedidoVenta_id')->references('id')->on('pedido_venta')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('factura_ventas');
    }
}
