<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIva extends Model
{
    protected $table = 'tipos_iva';
    protected $primaryKey = 'id_iva';
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
