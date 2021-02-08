<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Librodiario extends Model
{
    protected $table = 'librosdiarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'empresa_id'];

    // RELACIONES
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function libromayor()
    {
        return $this->hasOne(Libromayor::class, 'librodiario_id');
    }

    // Relación con Asiento
    public function asiento()
    {
        return $this->hasMany(Asiento::class,'libroDiario_id');
    }
}
