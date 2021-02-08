<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_compra', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            // Relación con empresa
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->on('empresas')->references('id');

            // Relación con proveedores
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->on('proveedores')->references('id');

            $table->boolean('estado')->default('0');
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
        Schema::dropIfExists('pedido_compra');
    }
}
