<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatinetaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('patinetas')->insert([
            [
                'id_usuario' => 1,
                'numero_serial' => 'SER001',
                'marca' => 'Xiaomi',
                'color' => 'Negro',
                'fecha_registro' => '2025-06-10'
            ],
            [
                'id_usuario' => 2,
                'numero_serial' => 'SER002',
                'marca' => 'Segway',
                'color' => 'Blanco',
                'fecha_registro' => '2025-06-11'
            ],
            [
                'id_usuario' => 3,
                'numero_serial' => 'SER003',
                'marca' => 'Ninebot',
                'color' => 'Rojo',
                'fecha_registro' => '2025-06-12'
            ],
            [
                'id_usuario' => 4,
                'numero_serial' => 'SER004',
                'marca' => 'Mearth',
                'color' => 'Gris',
                'fecha_registro' => '2025-06-13'
            ]
        ]);
    }
}

