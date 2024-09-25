<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entries')->insert([
                'user_id' => 1,
                'tournament_id' => 1,
                'nickname' => 'AA',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 2,
                'tournament_id' => 1,
                'nickname' => 'BB',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 3,
                'tournament_id' => 1,
                'nickname' => 'CC',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 4,
                'tournament_id' => 1,
                'nickname' => 'DD',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 5,
                'tournament_id' => 1,
                'nickname' => 'EE',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 6,
                'tournament_id' => 1,
                'nickname' => 'FF',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 7,
                'tournament_id' => 1,
                'nickname' => 'GG',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('entries')->insert([
                'user_id' => 8,
                'tournament_id' => 1,
                'nickname' => 'HH',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
