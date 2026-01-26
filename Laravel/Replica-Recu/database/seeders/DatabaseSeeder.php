<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => 'admin',
            'type' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => '12345'
        ]);

        $this->call([ClasificacionesSeeder::class,PeliculasSeeder::class,]);
    }
}
