<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = ['thriller', 'action', 'drama', 'love'];
        
        $countries = [
            'USA', 'UK', 'Canada', 'France', 'Germany', 'Spain', 'Italy', 
            'Australia', 'Japan', 'China', 'India', 'Brazil', 'Mexico',
            'Argentina', 'South Korea', 'Netherlands', 'Sweden', 'Norway',
            'Denmark', 'Finland', 'Poland', 'Russia', 'Greece', 'Ireland'
        ];

        return [
            'name' => fake()->words(3, true),
            'year' => fake()->year(),
            'genre' => fake()->randomElement($genres),
            'country' => fake()->randomElement($countries),
            'duration' => fake()->numberBetween(60, 180),
            'img_url' => fake()->imageUrl(400, 600, 'movies'),
        ];
    }
}
