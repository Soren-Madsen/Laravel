<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Actor;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::all();
        $actors = Actor::all();

        if ($films->isEmpty() || $actors->isEmpty()) {
            return;
        }

        foreach ($films as $film) {
            // Randomly assign 1-3 actors to each film
            $numActors = fake()->numberBetween(1, 3);
            
            // Get random actors
            $randomActors = $actors->random(min($numActors, $actors->count()));

            foreach ($randomActors as $actor) {
                DB::table('actors_films')->insert([
                    'film_id' => $film->id,
                    'actor_id' => $actor->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
