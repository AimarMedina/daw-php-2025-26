<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('torneo_usuarios')->insert(
        [
            [
                'id_Torneo' => 1,
                'id_Usuario' => 1
            ],
            [
                'id_Torneo' => 2,
                'id_Usuario' => 1
            ]
    ]);
    }
}
