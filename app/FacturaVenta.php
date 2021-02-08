<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
    protected $table='factura_ventas';
    protected  $primaryKey='id';
    protected  $fillable=[ 'descripcion','monto','asiento_id','empresa_id','pedidoVenta_id' ];

    // Relación con asiento
    public function asiento()
    {
        return $this->belongsTo(Asiento::class,'asiento_id');
    }
    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }
    // Relación con pedido Venta
    public function pedidoVenta()
    {
        return $this->belongsTo(PedidoVenta::class,'pedidoVenta_id');
    }
    public function pagoVenta()
    {
        return $this->hasMany(PagosVenta::class,'facturaVenta_id');
    }


}
