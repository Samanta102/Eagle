<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIva extends Model
{
    protected $table = 'tipos_iva';
    protected $primaryKey = 'id_iva';
    public $timestamps = false;

    protected $fillable = [
        'id_producto',
        'nombre_iva',
        'porcentaje',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
