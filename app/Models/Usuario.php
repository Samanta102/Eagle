<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
    'id_rol',
    'nombre_usuario',
    'apellido',
    'doc_identidad',
    'direccion',
    'telefono',
    'correo',
    'contrasena',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function patinetas()
    {
        return $this->hasMany(Patineta::class, 'id_usuario');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_usuario');
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_usuario');
    }
}
