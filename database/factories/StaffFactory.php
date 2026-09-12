<?php

namespace Database\Factories;

use App\Models\Manga;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'manga_id' => Manga::first()->id,
            'anime_id' => NULL,
            'name' => fake()->word(),
            'role' => fake()->word(),
            'image_path' =>
                'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F6e%2Fed%2F2f%2F6eed2f1df81acb6afc343fe32315c48e.jpg&f=1&nofb=1&ipt=3268d7184500a7a6f0b7302511e5f2338af81e809a699b0b742484bd343b31c7'
        ];
    }
}
