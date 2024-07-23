<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Eight_memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eight_members')->insert([
                'tournament_id' => 1,
                'entry1_id' => 1,
                'entry2_id' => 2,
                'entry3_id' => 3,
                'entry4_id' => 4,
                'entry5_id' => 5,
                'entry6_id' => 6,
                'entry7_id' => 7,
                'entry8_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
