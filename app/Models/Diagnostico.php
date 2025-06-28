<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $primaryKey = 'id_diagnostico';

    protected $fillable = [
        'id_cita',
        'id_usuario',
        'id_forma_pago',
        'descripcion',
        'costo_total',
        'fecha_emision',
    ];

    // Relaciones
    public function cita()
    {
        return $this->belongsTo(Cita::class, 'id_cita');
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'id_usuario');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormaPago::class, 'id_forma_pago');
    }
}

