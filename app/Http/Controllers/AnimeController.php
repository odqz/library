<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimeRequest;
use App\Http\Requests\UpdateAnimeRequest;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function index()
    {
        // Gets the top 30 animes from the AniList API
        $animes = $this->getMultipleAnimes();

        if ($animes["data"] != null) {
            // Converts each anime from an array to a Eloquent Anime model object
            $animes = $this->convertAnimesDetails($animes["data"]["anime"]["media"]);

            return view("animes.index", ['animes' => $animes]);
        } else {
            return view('api-error');
        }
    }

    /** 
     * Looks for the anime in the database
     * If it doesnt exist it gets the anime from the AniList API then creates it in the database
     */
    public function store(Int $id)
    {
        $anime = Anime::find($id);

        if ($anime == null) {
            $anime = $this->getIndividualAnime($id);
            // If API returns a anime then it adds it to the database, otherwise returns null to indicate API error
            $anime = $anime["data"] != null ? $this->createAnime($anime["data"]["Media"]) : null;
        }

        return $anime;
    }

    /**
     * Creates the anime in the database then displays that anime with info on whether user has added that anime to their library
     */
    public function show(Int $id)
    {
        $anime = $this->store($id);

        // If the store function returns null then the API is down
        if ($anime == null) {
            return view('api-error');
        }

        // Checks to see if the currently authenticated user has this anime in their library
        $inLibrary = $anime->watchings()->where('user_id', Auth::user()->id)->first() != null;

        return view('animes.show', ['anime' => $anime, 'inLibrary' => $inLibrary]);
    }

    public function findAnime(Request $request)
    {
        $animes = $this->animeSearch($request->search);

        if ($animes["data"] != null) {
            // Converts each anime from an array to a Eloquent Anime model object
            $animes = $this->convertAnimesDetails($animes["data"]["anime"]["media"]);

            return view("animes.index", ['animes' => $animes]);
        } else {
            return view('api-error');
        }
    }

    // Gets the top 30 animes for the index page
    public function getMultipleAnimes()
    {
        $query = 'query ($page: Int) {
            anime: Page(page: $page, perPage: 30) {
                media(type: ANIME, sort: SCORE_DESC) {
                    id
                    title {
                        english 
                        romaji 
                    } 
                    averageScore 
                    status 
                    genres
                    coverImage {
                        medium
                    }
                }
            }
        }';
 
        $respone = Http::post('https://graphql.anilist.co', [
            'query' => $query,
        ]);

        return $respone->json();
    }

    // Gets all the details on an individual anime based on passed id
    public function getIndividualAnime(Int $id)
    {
        $query = 'query ($id: Int) {
            Media(id: $id, type: ANIME) {
                id
                title {
                    english 
                    romaji 
                } 
                averageScore
                favourites
                episodes
                status 
                genres
                isAdult
                description
                countryOfOrigin
                characters {
                    edges {
                        role
                        node {
                            name {
                                full
                            }
                            image {
                                medium
                            }
                        }
                    }
                }
                staff {
                    edges {
                        role
                        node {
                            name {
                                full
                            }
                            image {
                                medium
                            }
                        }
                    }
                }
                coverImage {
                    extraLarge
                }
            }
        }';
 
        $variables = [
            "id" => $id,
        ];

        $respone = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables,
        ]);

        return $respone->json();
    }

    // Converts the anime array returrned by the API to a Eloquent Manga model object
    public function convertAnimesDetails(Array $animesArray)
    {
        $animes = [];

        for ($i = 0; $i < sizeof($animesArray); $i++) {
            $animes[$i] = new Anime([
                'id' => $animesArray[$i]["id"],
                'title_english' => $animesArray[$i]["title"]["english"],
                'title_romaji' => $animesArray[$i]["title"]["romaji"],
                'average_score' => $animesArray[$i]["averageScore"],
                'status' => $animesArray[$i]["status"],
                'genres' => $animesArray[$i]["genres"],
                'cover_image_path' => $animesArray[$i]["coverImage"]["medium"],
            ]);
        }

        return $animes;
    }

    // Adds the anime to the database and creates the subsequent staff/characters in the database
    public function createAnime(Array $animeArray)
    {
        $anime = Anime::create([
            'id' => $animeArray["id"],
            'title_english' => $animeArray["title"]["english"],
            'title_romaji' => $animeArray["title"]["romaji"],
            'average_score' => $animeArray["averageScore"],
            'favourites' => $animeArray["favourites"],
            'episodes' => $animeArray["episodes"],
            'status' => $animeArray["status"],
            'genres' => $animeArray["genres"],
            'is_adult' => $animeArray["description"],
            'description' => $animeArray["description"],
            'country_of_origin' => $animeArray["countryOfOrigin"],
            'cover_image_path' => $animeArray["coverImage"]["extraLarge"],
        ]);

        foreach ($animeArray["staff"]["edges"] as $staff) {
            $anime->staff()->create([
                'name' => $staff["node"]["name"]["full"],
                'role' => $staff["role"],
                'image_path' => $staff["node"]["image"]["medium"],
            ]);
        }

        foreach ($animeArray["characters"]["edges"] as $char) {
            $anime->characters()->create([
                'name' => $char["node"]["name"]["full"],
                'role' => $char["role"],
                'image_path' => $char["node"]["image"]["medium"],
            ]);
        }

        return $anime;
    }

    public function animeSearch(String $name)
    {
        $query = 'query ($page: Int, $name: String) {
            anime: Page(page: $page) {
                media(type: ANIME, search: $name) {
                    id
                    title {
                        english 
                        romaji 
                    } 
                    averageScore 
                    status 
                    genres
                    coverImage {
                        medium
                    }
                }
            }
        }';

        $variables = [
            "name" => $name,
        ];


        $response = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables,
        ]);

        $animes = $response->json();

        return $animes;
    }
}
