<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = [
            'USA', 'UK', 'Canada', 'France', 'Germany', 'Spain', 'Italy', 
            'Australia', 'Japan', 'China', 'India', 'Brazil', 'Mexico',
            'Argentina', 'South Korea', 'Netherlands', 'Sweden', 'Norway',
            'Denmark', 'Finland', 'Poland', 'Russia', 'Greece', 'Ireland'
        ];

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'birthdate' => fake()->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
            'country' => fake()->randomElement($countries),
            'img_url' => fake()->imageUrl(400, 600, 'people'),
        ];
    }
}
