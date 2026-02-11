<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActorAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all actors and awards
        $actors = DB::table('actors')->pluck('id')->toArray();
        $awards = DB::table('awards')->pluck('id')->toArray();

        // Assign random awards to actors (maintaining cardinality: 0 to 3 awards per actor)
        foreach ($actors as $actorId) {
            $numAwards = $faker->numberBetween(0, 3);
            $randomAwards = $faker->randomElements($awards, $numAwards);

            foreach ($randomAwards as $awardId) {
                DB::table('actors_awards')->insert([
                    'actor_id' => $actorId,
                    'award_id' => $awardId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
