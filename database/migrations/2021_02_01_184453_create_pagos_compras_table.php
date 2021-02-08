<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_compras', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->boolean('estado')->default('0');

            // Relación con Pagos Compra
            $table->unsignedBigInteger('facturaCompra_id');
            $table->foreign('facturaCompra_id')->references('id')->on('factura_compras')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pagos_compras');
    }
}
