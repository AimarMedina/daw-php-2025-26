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
                'juego' => 'League of Legends',
                'descripcion' => 'Torneo clasificatorio para la temporada primavera. Equipos de 5 jugadores.',
                'fecha_inicio' => '2025-03-15',
                'plazas_totales' => 32,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Champions Cup',
                'juego' => 'Valorant',
                'descripcion' => 'Copa de campeones con premios en efectivo. Formato 5v5.',
                'fecha_inicio' => '2025-04-10',
                'plazas_totales' => 16,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Masters Tournament',
                'juego' => 'CS:GO',
                'descripcion' => 'Torneo profesional con las mejores escuadras del país.',
                'fecha_inicio' => '2025-05-20',
                'plazas_totales' => 24,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Rocket League Pro',
                'juego' => 'Rocket League',
                'descripcion' => 'Competición 3v3 para equipos profesionales.',
                'fecha_inicio' => '2025-03-25',
                'plazas_totales' => 16,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'FIFA Champions',
                'juego' => 'FIFA 24',
                'descripcion' => 'Torneo individual de FIFA. Premios para los 3 primeros.',
                'fecha_inicio' => '2025-04-05',
                'plazas_totales' => 64,
                'estado' => 'abierto'
            ],
            [
                'titulo' => 'Winter Cup',
                'juego' => 'Fortnite',
                'descripcion' => 'Copa de invierno - modo squad. Premios especiales.',
                'fecha_inicio' => '2025-02-15',
                'plazas_totales' => 40,
                'estado' => 'cerrado'
            ],
        ]);
    }
}
