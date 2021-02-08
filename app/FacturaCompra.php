<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{
    protected $table='factura_compras';
    protected  $primaryKey='id';
    protected  $fillable=[ 'descripcion','monto','asiento_id','pedidoCompra_id' ];

    // Relación con asiento
    public function asiento()
    {
        return $this->belongsTo(Asiento::class,'asiento_id');
    }
    // Relación con Pedido Compras
    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class,'pedidoCompra_id');
    }



    // Relación con pagos Compra
    public function pagoCompra()
    {
        return $this->hasMany(PagosCompra::class,'facturaCompra_id');
    }


}
