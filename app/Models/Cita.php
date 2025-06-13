<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function patineta()
    {
        return $this->belongsTo(Patineta::class, 'id_patineta');
    }

    public function diagnostico()
    {
        return $this->hasOne(Diagnostico::class, 'id_cita');
    }

    public function orden()
    {
        return $this->hasOne(OrdenServicio::class, 'id_cita');
    }
}
