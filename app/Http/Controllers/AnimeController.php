<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimeRequest;
use App\Http\Requests\UpdateAnimeRequest;
use App\Models\Anime;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anime = $this->getMultipleAnimes();
        return $anime["data"] == null ? view('api-error') : view('animes.index', ['animes' => $this->convertAnimesDetails($anime["data"]["anime"]["media"])]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Int $id)
    {
        if (Anime::where('id', $id)->exists()) {
            return view('animes.show', ['anime' => Anime::find($id)]);
        } else {
            $anime = $this->getIndividualAnime($id);
            return $anime["data"] == null ? view('api-error') : view('animes.show', ['anime' => $this->createAnime($anime["data"]["Media"])]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimeRequest $request, Anime $anime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        //
    }

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
}
