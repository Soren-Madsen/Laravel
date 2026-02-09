<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
                'country' => $faker->country(),
                'img_url' => $faker->imageUrl(400, 600, 'people'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
