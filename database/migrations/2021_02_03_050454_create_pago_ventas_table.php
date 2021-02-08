<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_ventas', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->boolean('estado')->default('0');

            // Relación con factura venta
            $table->unsignedBigInteger('facturaVenta_id');
            $table->foreign('facturaVenta_id')->references('id')->on('factura_ventas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pago_ventas');
    }
}
