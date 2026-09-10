<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\User;
use App\Models\Watching;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Watching>
 */
class WatchingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $animes = Anime::all();

        $user = $users[rand(0, sizeof($users) - 1)];
        $anime = $animes[rand(0, sizeof($animes) - 1)];

        return [
            'user_id' => $user->id,
            'anime_id' => $anime->id,
            'episodes_watched' => fake()->numberBetween(0, $anime->episodes),
            'status' => fake()->word(),
            'rating' => fake()->randomNumber(2),
            'review' => fake()->text(),
        ];
    }
}
