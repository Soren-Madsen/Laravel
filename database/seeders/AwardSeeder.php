<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $awardNames = [
            'Academy Award',
            'Golden Globe',
            'BAFTA Award',
            'Screen Actors Guild Award',
            'Cannes Film Festival Award',
            'Berlin International Film Festival Award',
            'Venice Film Festival Award',
            'European Film Award',
            'Cesar Award',
            'Silver Bear',
            'Golden Lion',
            'Palme d\'Or',
            'Emmy Award',
            'Tony Award',
            'National Board of Review',
            'Independent Spirit Award',
            'Satellite Award',
        ];

        $categories = [
            'Best Actor',
            'Best Supporting Actor',
            'Best Lead Role',
            'Outstanding Performance',
            'Best International Actor',
            'Lifetime Achievement',
            'Critics Choice',
            'Audience Choice',
            'Best Ensemble Cast',
            'Best Actor in a Drama',
            'Best Actor in a Comedy',
        ];

        // Create 15 awards with random data
        for ($i = 0; $i < 15; $i++) {
            DB::table('awards')->insert([
                'name' => $faker->randomElement($awardNames),
                'year' => $faker->numberBetween(2015, 2025),
                'category' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
