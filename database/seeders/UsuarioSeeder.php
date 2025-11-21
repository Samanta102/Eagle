<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder {
    public function run(): void {
        
        DB::table('usuarios')->insert([
            [
                'id_rol' => 1,
                'nombre_usuario' => 'Samanta',
                'apellido' => 'Parrado',
                'doc_identidad' => '888',
                'direccion' => 'Calle 1 #23-45',
                'telefono' => '3001234567',
                'correo' => 'samanta@example.com',
                'contrasena' => bcrypt('Sam8901')
            ],
            [
                'id_rol' => 1,
                'nombre_usuario' => 'Dylan',
                'apellido' => 'Gonzalez',
                'doc_identidad' => '777',
                'direccion' => 'Calle 1 #23-45',
                'telefono' => '3001234567',
                'correo' => 'dylan.gonzalez@example.com',
                'contrasena' => bcrypt('Dylan4567')
            ],
            [
                'id_rol' => 1,
                'nombre_usuario' => 'Richard',
                'apellido' => 'Lotte',
                'doc_identidad' => '44',
                'direccion' => 'Carrera 7 #12-34',
                'telefono' => '3012345678',
                'correo' => 'richi@example.com',
                'contrasena' => bcrypt('Rich1594')
            ],
            [
                'id_rol' => 2,
                'nombre_usuario' => 'Laura',
                'apellido' => 'Martínez',
                'doc_identidad' => '555666777',
                'direccion' => 'Av 3 #22-10',
                'telefono' => '3023456789',
                'correo' => 'laura@example.com',
                'contrasena' => bcrypt('Lau6524')
            ],
            [
                'id_rol' => 3,
                'nombre_usuario' => 'Andrés',
                'apellido' => 'Ríos',
                'doc_identidad' => '444555666',
                'direccion' => 'Calle 9 #10-11',
                'telefono' => '3034567890',
                'correo' => 'andres@example.com',
                'contrasena' => bcrypt('And8456')
            ]
        ]);
    }
}


