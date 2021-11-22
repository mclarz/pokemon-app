<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // admin
        DB::table('pokemon')->insert([
            'user_id' => 1,
            'pokemon_id' => 2,
            'status' => 1
        ]);
        
        DB::table('pokemon')->insert([
            'user_id' => 1,
            'pokemon_id' => 3,
            'status' => 1
        ]);

        DB::table('pokemon')->insert([
            'user_id' => 1,
            'pokemon_id' => 1,
            'status' => 1
        ]);

        DB::table('pokemon')->insert([
            'user_id' => 1,
            'pokemon_id' => 4,
            'status' => 0,
        ]);

        // tester
        DB::table('pokemon')->insert([
            'user_id' => 2,
            'pokemon_id' => 5,
            'status' => 1
        ]);
        
        DB::table('pokemon')->insert([
            'user_id' => 2,
            'pokemon_id' => 21,
            'status' => 1
        ]);

        DB::table('pokemon')->insert([
            'user_id' => 2,
            'pokemon_id' => 33,
            'status' => 0
        ]);

        // tester1

          DB::table('pokemon')->insert([
            'user_id' => 3,
            'pokemon_id' => 12,
            'status' => 1
        ]);
        
        DB::table('pokemon')->insert([
            'user_id' => 3,
            'pokemon_id' => 13,
            'status' => 1
        ]);

        DB::table('pokemon')->insert([
            'user_id' => 3,
            'pokemon_id' => 22,
            'status' => 0
        ]);

    }
}
