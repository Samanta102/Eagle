<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    public $incrementing = false;

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_producto');
    }

    public function tipoIva()
    {
        return $this->hasOne(TipoIva::class, 'id_producto');
    }
}
