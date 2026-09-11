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
        $users = User::all();
        $mangas = Manga::all();

        $user = $users[rand(0, sizeof($users) - 1)];
        $manga = $mangas[rand(0, sizeof($mangas) - 1)];

        return [
            'user_id' => $user->id,
            'manga_id' => $manga->id,
            'chapters_read' => fake()->numberBetween(0, $manga->chapters),
            'volumes_read' => fake()->numberBetween(0, $manga->volumes),
            'status' => fake()->word(),
            'rating' => fake()->randomNumber(2),
            'review' => fake()->paragraph(),
        ];
    }
}
