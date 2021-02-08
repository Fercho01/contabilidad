<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'ci', 'nombre', 'direccion','empresa_id' ];

    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    // Relación con pedido venta
    public function pedidoVenta()
    {
        return $this->hasMany(PedidoVenta::class,'cliente_id');
    }
}
