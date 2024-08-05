<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scores')->insert([
                'entry_id' => 1,
                'member' => 8,
                'number' => 1,
                'score' => 1010000,
                'exscore' => 0,
                'justice_critical' => 2000,
                'justice' => 0,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 2,
                'member' => 8,
                'number' => 1,
                'score' => 1009995,
                'exscore' => 1,
                'justice_critical' => 1999,
                'justice' => 1,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 3,
                'member' => 8,
                'number' => 1,
                'score' => 1009990,
                'exscore' => 2,
                'justice_critical' => 1998,
                'justice' => 2,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 4,
                'member' => 8,
                'number' => 1,
                'score' => 1009985,
                'exscore' => 3,
                'justice_critical' => 1997,
                'justice' => 3,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 5,
                'member' => 8,
                'number' => 1,
                'score' => 1009980,
                'exscore' => 4,
                'justice_critical' => 1996,
                'justice' => 4,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 6,
                'member' => 8,
                'number' => 1,
                'score' => 1009975,
                'exscore' => 5,
                'justice_critical' => 1995,
                'justice' => 5,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 7,
                'member' => 8,
                'number' => 1,
                'score' => 1009970,
                'exscore' => 6,
                'justice_critical' => 1994,
                'justice' => 6,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
                
        DB::table('scores')->insert([
                'entry_id' => 8,
                'member' => 8,
                'number' => 1,
                'score' => 1009965,
                'exscore' => 7,
                'justice_critical' => 1993,
                'justice' => 7,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 1,
                'member' => 4,
                'number' => 1,
                'score' => 1010000,
                'exscore' => 0,
                'justice_critical' => 3000,
                'justice' => 0,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 3,
                'member' => 4,
                'number' => 1,
                'score' => 1009996,
                'exscore' => 1,
                'justice_critical' => 2999,
                'justice' => 1,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 5,
                'member' => 4,
                'number' => 1,
                'score' => 1009993,
                'exscore' => 2,
                'justice_critical' => 2998,
                'justice' => 2,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('scores')->insert([
                'entry_id' => 7,
                'member' => 4,
                'number' => 1,
                'score' => 1009990,
                'exscore' => 3,
                'justice_critical' => 2997,
                'justice' => 3,
                'attack' => 0,
                'miss' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);

    }
}
