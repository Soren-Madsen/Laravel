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
            // Randomly assign 1-3 actors to each film (unique actors)
            $numActors = fake()->numberBetween(1, min(3, $actors->count()));
            
            // Get random unique actors
            $randomActors = $actors->random($numActors);

            foreach ($randomActors as $actor) {
                // Check if relation already exists before inserting
                $exists = DB::table('actor_film')
                    ->where('film_id', $film->id)
                    ->where('actor_id', $actor->id)
                    ->exists();
                
                if (!$exists) {
                    DB::table('actor_film')->insert([
                        'film_id' => $film->id,
                        'actor_id' => $actor->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
