<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {
        for ($count = 0; $count <= 20; $count++) {
            DB::table('tags')->insert([
                'name' => fake()->name(),
            ]);
        }
    }
}
