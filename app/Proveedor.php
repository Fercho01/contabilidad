<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table='proveedores';
    protected $primaryKey='id';
    protected $fillable=['nombre','apellido','estado','empresa','ci','empresaId'];

    // Relación con pedido Compra
    public function pedidoCompra(){
        return $this->hasMany(Empresa::class, 'id_proveedor');
    }

}
