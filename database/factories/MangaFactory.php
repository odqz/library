<?php

namespace Database\Factories;

use App\Models\Manga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();

        return [
            'id' => fake()->randomNumber(2),
            'title_english' =>  $name,
            'title_romaji' => $name,
            'average_score' => fake()->randomNumber(2),
            'favourites' => fake()->randomNumber(5),
            'volumes' => fake()->randomNumber(3),
            'chapters' => fake()->randomNumber(4),
            'status' => fake()->word(),
            'genres' => fake()->words(4),
            'is_adult' => false,
            'description' => fake()->text(),
            'country_of_origin' => fake()->word(),
            'cover_image_path' => 
                'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd28hgpri8am2if.cloudfront.net%2Fbook_images%2Fonix%2Fcvr9781421577449%2Fvagabond-vol-37-9781421577449_hr.jpg&f=1&nofb=1&ipt=245c4a9871ab381eb0c78d1693496893ef1a04487d3416bcfc34d35b48720957',
        ];
    }
}
