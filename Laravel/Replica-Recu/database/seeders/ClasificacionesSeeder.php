<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clasificaciones')->insert(
            [
                [
                    'clasificacion' => 'ATP'
                ],
                [
                    'clasificacion' => '+7'
                ],
                [
                    'clasificacion' => '+13'
                ],
                [
                    'clasificacion' => '+18'
                ]
            ]
        );
    }
}
