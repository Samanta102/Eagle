<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Diagnostico;
use App\Models\FormaPago;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones'; 
    protected $primaryKey = 'id_cotizacion';
    public $timestamps = true;

    protected $fillable = [
        'id_diagnostico',
        'id_usuario',
        'id_forma_pago',
        'total',
        'fecha_emicion',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function diagnostico() {
        return $this->belongsTo(Diagnostico::class, 'id_diagnostico');
    }

    public function formaPago() {
        return $this->belongsTo(FormaPago::class, 'id_forma_pago');
    }
}

