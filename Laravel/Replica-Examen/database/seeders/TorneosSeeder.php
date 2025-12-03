<?php
// database\seeders\TorneosSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos')->insert([
            [
                'titulo' => 'Torneo Spring 2025',
                'id_juego' => 1,
                'descripcion' => 'Torneo clasificatorio para la temporada primavera. Equipos de 5 jugadores.',
                'fecha_inicio' => '2025-03-15',
                'plazas_totales' => 32,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Champions Cup',
                'id_juego' => 1,
                'descripcion' => 'Copa de campeones con premios en efectivo. Formato 5v5.',
                'fecha_inicio' => '2025-04-10',
                'plazas_totales' => 16,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Masters Tournament',
                'id_juego' => 3,
                'descripcion' => 'Torneo profesional con las mejores escuadras del país.',
                'fecha_inicio' => '2025-05-20',
                'plazas_totales' => 24,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Rocket League Pro',
                'id_juego' => 3,
                'descripcion' => 'Competición 3v3 para equipos profesionales.',
                'fecha_inicio' => '2025-03-25',
                'plazas_totales' => 16,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'FIFA Champions',
                'id_juego' => 2,
                'descripcion' => 'Torneo individual de FIFA. Premios para los 3 primeros.',
                'fecha_inicio' => '2025-04-05',
                'plazas_totales' => 64,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Winter Cup',
                'id_juego' => 4,
                'descripcion' => 'Copa de invierno - modo squad. Premios especiales.',
                'fecha_inicio' => '2025-02-15',
                'plazas_totales' => 40,
                'estado' => 'cerrado'
            ],
        ]);
    }
}
