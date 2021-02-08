<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoCompra extends Model
{
    protected $table='pedido_compra';
    protected $primaryKey='id';
    protected $fillable=['descripcion','id_empresa','id_proveedor'];


    // Relación con empresa
    public function empresa(){
        return $this->belongsTo(Empresa::class,'id_empresa');
    }

    // Relación con proveedores
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'id_proveedor');
    }

    // Relación con factura compra
    public function facturaCompra()
    {
        return $this->hasOne(FacturaCompra::class,'pedidoCompra_id');
    }
}
