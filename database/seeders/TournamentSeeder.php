<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tournaments')->insert([
                'search_id' => 'TEST01',
                'password' => Hash::make('test01'),
                'name' => 'テスト大会',
                'body' => 'テストです',
                'champion' => NULL,
                'justice_point' => 1,
                'attack_point' => 3,
                'miss_point' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
