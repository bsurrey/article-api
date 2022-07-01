<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        for ($count = 0; $count <= 10; $count++) {
            DB::table('articles')->insert([
                'name' => fake()->name(),
                'author' => fake()->userName(),
                'text' => fake()->text(),
                'publication_date' => now(),
                'expiration_date' => fake()->date(),
                'created_at' => now(),
            ]);
        }
    }
}
