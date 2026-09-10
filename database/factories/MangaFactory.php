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

// Need to make a reading factory which randomly chooses a manga and a user
// Then uses their ids as the keys for them
// The other info would be generated using fake()
// The shelf page would then be the user show page which would get all the users readings and from that get the manga
// When the user clicks on page it would take them to the manga#show page which would also have their data like volumes: 10/40 instead of just 40
// Each show page would need to also have a remove from library page
// The manga/anime show all page would use the api but if thats not availbe would default to just the data stored in my DB