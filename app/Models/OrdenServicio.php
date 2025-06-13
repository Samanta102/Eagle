<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    protected $table = 'ordenes_servicio';
    protected $primaryKey = 'id_orden';
    public $timestamps = false;

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'id_cita');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_orden');
    }
}
