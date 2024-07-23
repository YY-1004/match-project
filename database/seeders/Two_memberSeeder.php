<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Two_memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('two_members')->insert([
                'tournament_id' => 1,
                'entry1_id' => 1,
                'entry2_id' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
