<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $films = DB::table('films')->pluck('id')->toArray();
        $actors = DB::table('actors')->pluck('id')->toArray();

        foreach ($films as $filmId) {
            $numActors = $faker->numberBetween(1, 3);
            
            $randomActors = $faker->randomElements($actors, $numActors);

            foreach ($randomActors as $actorId) {
                DB::table('films_actors')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
