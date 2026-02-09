<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->words(3, true),
                'year' => $faker->year(),
                'genre' => $faker->word(),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(60, 180),
                'img_url' => $faker->imageUrl(400, 600, 'movies'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
