<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'id_rol' => 2,
                'nombre_usuario' => 'Samanta',
                'apellido' => 'Parrado',
                'doc_identidad' => '123456789',
                'direccion' => 'Calle 1 #23-45',
                'telefono' => '3001234567',
                'correo' => 'samanta@example.com',
                'contrasena' => bcrypt('123456')
            ],
            [
                'id_rol' => 2,
                'nombre_usuario' => 'Carlos',
                'apellido' => 'Gómez',
                'doc_identidad' => '987654321',
                'direccion' => 'Carrera 7 #12-34',
                'telefono' => '3012345678',
                'correo' => 'carlos@example.com',
                'contrasena' => bcrypt('123456')
            ],
            [
                'id_rol' => 3,
                'nombre_usuario' => 'Laura',
                'apellido' => 'Martínez',
                'doc_identidad' => '555666777',
                'direccion' => 'Av 3 #22-10',
                'telefono' => '3023456789',
                'correo' => 'laura@example.com',
                'contrasena' => bcrypt('123456')
            ],
            [
                'id_rol' => 3,
                'nombre_usuario' => 'Andrés',
                'apellido' => 'Ríos',
                'doc_identidad' => '444555666',
                'direccion' => 'Calle 9 #10-11',
                'telefono' => '3034567890',
                'correo' => 'andres@example.com',
                'contrasena' => bcrypt('123456')
            ]
        ]);
    }
}


