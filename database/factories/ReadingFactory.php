<?php

namespace Database\Factories;

use App\Models\Manga;
use App\Models\Reading;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reading>
 */
class ReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $manga = Manga::first();

        return [
            'user_id' => User::first(),
            'manga_id' => $manga->id,
            'chapters_read' => fake()->numberBetween(0, $manga->chapters),
            'volumes_read' => fake()->numberBetween(0, $manga->volumes),
            'status' => fake()->word(),
            'rating' => fake()->randomNumber(2),
            'review' => fake()->paragraph(),
        ];
    }
}
