<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peliculas')->insert([
            [
                'titulo' => 'El Origen del Planeta de los Simios',
                'director' => 'Rupert Wyatt',
                'genero' => 'Ciencia Ficción',
                'sinopsis' => 'Un experimento científico provoca un aumento de inteligencia en los simios y desata una rebelión.',
                'fecha_estreno' => '2011-07-08',
                'duracion_min' => 105,
                'clasificacion_id' => 1,
            ],
            [
                'titulo' => 'Avatar',
                'director' => 'James Cameron',
                'genero' => 'Aventura',
                'sinopsis' => 'En un mundo alienígena, un humano se une a los habitantes locales para proteger su hogar.',
                'fecha_estreno' => '2009-12-18',
                'duracion_min' => 162,
                'clasificacion_id' => 3,
            ],
            [
                'titulo' => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'genero' => 'Acción',
                'sinopsis' => 'Batman se enfrenta al Joker, un criminal que siembra el caos en Gotham.',
                'fecha_estreno' => '2008-07-18',
                'duracion_min' => 152,
                'clasificacion_id' => 3,
            ],
            [
                'titulo' => 'Deadpool',
                'director' => 'Tim Miller',
                'genero' => 'Comedia / Acción',
                'sinopsis' => 'Un antihéroe irreverente busca vengarse tras un experimento que lo deja con poderes regenerativos.',
                'fecha_estreno' => '2016-02-12',
                'duracion_min' => 108,
                'clasificacion_id' => 4,
            ],
        ]);
    }
}
