<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asiento extends Model
{
    protected $table='asientos';
    protected $primaryKey='id';
    protected $fillable=[ 'moneda','libroDiario_id' ];
    protected $timestamp = true;

    // Relación con Asientos
    public function libroDiario(){
        return $this->BelongsTo(Librodiario::class,'libroDiario_id');
    }

    // Relación con Factura Compras
    public function facturaCompra()
    {
        return $this->hasMany(FacturaCompra::class,'asiento_id');
    }

    // Relación con factura Ventas
    public function facturaVenta()
    {
        return $this->hasMany(FacturaVenta::class,'asiento_id');
    }
}
