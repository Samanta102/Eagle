<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patineta extends Model
{
    protected $table = 'patinetas';
    protected $primaryKey = 'id_patineta';
    public $timestamps = false;

    protected $fillable = [
    'id_usuario',
    'numero_serial',
    'marca',
    'color',
    'fecha_registro'
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_patineta');
    }
}
