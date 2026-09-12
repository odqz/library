<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Manga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Character>
 */
class CharacterFactory extends Factory
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
                'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpreview.redd.it%2Fdoes-matahachi-ever-become-strong-v0-n8rp3ea8ux4c1.jpeg%3Fauto%3Dwebp%26s%3Dbdaa68dd0d6792035bf0d9b29ac9e593fc2dbc81&f=1&nofb=1&ipt=19cbccbef07419274faebed24eecf43150e4a7b186a69216c64ac0da1de9b760'
        ];
    }
}
