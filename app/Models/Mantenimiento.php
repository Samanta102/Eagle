<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';
    protected $primaryKey = 'id_mantenimiento';
    public $timestamps = false;

    public function orden()
    {
        return $this->belongsTo(OrdenServicio::class, 'id_orden');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
