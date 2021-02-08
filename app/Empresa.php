<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table='empresas';
    protected  $primaryKey='id';
    protected  $fillable=[ 'nombre' ];

    // Relación con Pedido Compra
    public function pedidoCompra(){
        return $this->hasMany(Empresa::class, 'id_empresa');
    }

    public function librosdiarios()
    {
        return $this->hasMany(Librodiario::class, 'empresa_id');
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->hasMany(Cliente::class,'empresa_id');
    }
    // Relación con factura venta
    public function facturaVenta()
    {
        return $this->hasMany(FacturaVenta::class,'empresa_id');
    }
}
