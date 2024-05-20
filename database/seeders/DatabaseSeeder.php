<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Kateryna',
            'email' => 'kateryna.chelpan@gmail.com',
            'password' => bcrypt('763KF/%13'),
            'email_verified_at' => time()
        ]);

        Project::factory()->count(20)->hasTasks(20)->create();
    }
}