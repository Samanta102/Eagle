<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';
    protected $primaryKey = 'id_diagnostico';
    public $timestamps = false;
    
    protected $fillable = ['id_cita', 'descripcion', 'costo_total'];


    public function cita()
    {
        return $this->belongsTo(Cita::class, 'id_cita');
    }

    public function cotizacion()
    {
        return $this->hasOne(Cotizacion::class, 'id_diagnostico');
    }
}
