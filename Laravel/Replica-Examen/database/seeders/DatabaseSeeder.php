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
            'name' => 'Test User',
            'email' => 'test@admin.com',
            'password' => bcrypt('admin'),
            'type' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test@user.com',
            'password' => bcrypt('12345Abcde'),
            'type' => 'user'
        ]);

        $this->call([
            JuegosSeeder::class,
            TorneosSeeder::class,
            TorneoUsuarioSeeder::class
        ]);
    }
}
