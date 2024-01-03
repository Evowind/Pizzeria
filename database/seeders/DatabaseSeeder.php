<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'nom' => Str::random(10),
            'description' => Str::random(10),
            'prix' => rand(10, 100),
        ]);
    }
}
