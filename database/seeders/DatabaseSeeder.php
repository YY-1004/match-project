<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TournamentSeeder::class,
            EntrySeeder::class,
            Eight_memberSeeder::class,
            // Four_memberSeeder::class,
            // Two_memberSeeder::class,
            ScoreSeeder::class,
        ]);
    }
}
