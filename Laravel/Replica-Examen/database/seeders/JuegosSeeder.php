<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('juegos')->insert([
            [
                'nombre' => 'Valorant'
            ],
            [
                'nombre' => 'FIFA'
            ],
            [
                'nombre' => 'LOL'
            ],
            [
                'nombre' => 'Skate 4'
            ]
        ]);

    }
}
