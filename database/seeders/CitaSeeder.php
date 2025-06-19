<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('citas')->insert([
            [
                'id_usuario' => 1,
                'id_patineta' => 1,
                'fecha' => '2025-06-20',
                'hora' => '09:00:00',
                'motivo' => 'Revisión de frenos'
            ],
            [
                'id_usuario' => 2,
                'id_patineta' => 2,
                'fecha' => '2025-06-21',
                'hora' => '10:00:00',
                'motivo' => 'Ruido en la rueda trasera'
            ],
            [
                'id_usuario' => 3,
                'id_patineta' => 3,
                'fecha' => '2025-06-22',
                'hora' => '11:30:00',
                'motivo' => 'Problema de carga'
            ],
            [
                'id_usuario' => 4,
                'id_patineta' => 4,
                'fecha' => '2025-06-23',
                'hora' => '14:00:00',
                'motivo' => 'Mantenimiento general'
            ]
        ]);
    }
}

