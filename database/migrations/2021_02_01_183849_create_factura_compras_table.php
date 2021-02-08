<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_compras', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->float('monto');
            $table->boolean('estado')->default('0');

            // Relación con Asiento
            $table->unsignedBigInteger('asiento_id');
            $table->foreign('asiento_id')->references('id')->on('asientos')->onUpdate('cascade')->onDelete('cascade');

            // Relación con Pedido Compra
            $table->unsignedBigInteger('pedidoCompra_id');
            $table->foreign('pedidoCompra_id')->references('id')->on('pedido_compra')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('factura_compras');
    }
}
