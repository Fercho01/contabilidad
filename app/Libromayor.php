<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libromayor extends Model
{
    protected $table = 'librosmayores';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'librodiario_id'];

    // RELACIONES
    public function librodiario()
    {
        return $this->belongsTo(Librodiario::class, 'librodiario_id');
    }
}
