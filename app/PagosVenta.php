<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosVenta extends Model
{
    protected $table = 'pago_ventas';
    protected $primaryKey = 'id';
    protected $fillable = [ 'monto','facturaVenta_id' ];

    // Relación con factura Venta
    public function facturaVenta()
    {
        return $this->belongsTo(FacturaVenta::class,'facturaVenta_id');
    }
}
