<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = 'formas_pago';
    protected $primaryKey = 'id_forma_pago';
    public $timestamps = false;

    // 🛠️ Solución aquí:
    protected $fillable = ['nombre'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_forma_pago');
    }
}

