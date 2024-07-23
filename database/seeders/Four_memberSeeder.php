<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Four_memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('four_members')->insert([
                'tournament_id' => 1,
                'entry1_id' => 1,
                'entry2_id' => 3,
                'entry3_id' => 5,
                'entry4_id' => 7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
