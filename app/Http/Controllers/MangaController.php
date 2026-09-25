<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMangaRequest;
use App\Http\Requests\UpdateMangaRequest;
use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function index(Request $request)
    {
        $mangas = $this->getMangas($request);

        if ($mangas["data"] != null) {
            // Converts each manga from an array to a Eloquent Manga model object
            $mangas = $this->convertMangasDetails($mangas["data"]["Page"]["media"]);
            $page = $request->page == null ? 1 : $request->page;
            return view("media.index", ['medias' => $mangas, 'page_number' => $page, 'type' => 'manga']);
        } else {
            return view('api-error');
        }
    }

    /** 
     * Looks for the manga in the database
     * If it doesnt exist it gets the manga from the AniList API then creates it in the database
     */
    public function store(Int $id)
    {
        $manga = Manga::find($id);

        if ($manga == null) {
            $manga = $this->getIndividualManga($id);
            // If API returns a manga then it adds it to the database, otherwise returns null to indicate API error
            $manga = $manga["data"] != null ? $this->createManga($manga["data"]["Media"]) : null;
        }

        return $manga;
    }

    /**
     * Creates the manga in the database then displays that manga with info on whether user has added that manga to their library
     */
    public function show(Int $id)
    {
        $manga = $this->store($id);

        // If the store function returns null then the API is down
        if ($manga == null) {
            return view('api-error');
        }

        // Checks to see if the currently authenticated user has this manga in their library
        $inLibrary = $manga->readings()->where('user_id', Auth::user()->id)->first() != null;

        return view('media.show', ['media' => $manga, 'inLibrary' => $inLibrary, 'type' => 'manga']);
    }

    // Gets all the details on an individual manga based on passed id
    public function getIndividualManga(Int $id)
    {
        $query = 'query ($id: Int) {
            Media(id: $id, type: MANGA) {
                id
                title {
                    english 
                    romaji 
                } 
                averageScore
                favourites
                volumes
                chapters
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

    // Converts the manga array returrned by the API to a Eloquent Manga model object
    public function convertMangasDetails(Array $mangasArray)
    {
        $mangas = [];

        for ($i = 0; $i < sizeof($mangasArray); $i++) {
            $mangas[$i] = new Manga([
                'id' => $mangasArray[$i]["id"],
                'title_english' => $mangasArray[$i]["title"]["english"],
                'title_romaji' => $mangasArray[$i]["title"]["romaji"],
                'average_score' => $mangasArray[$i]["averageScore"],
                'status' => $mangasArray[$i]["status"],
                'genres' => $mangasArray[$i]["genres"],
                'cover_image_path' => $mangasArray[$i]["coverImage"]["medium"],
            ]);
        }

        return $mangas;
    }

    // Adds the manga to the database and creates the subsequent staff/characters in the database
    public function createManga(Array $mangaArray)
    {
        $manga = Manga::create([
            'id' => $mangaArray["id"],
            'title_english' => $mangaArray["title"]["english"],
            'title_romaji' => $mangaArray["title"]["romaji"],
            'average_score' => $mangaArray["averageScore"],
            'favourites' => $mangaArray["favourites"],
            'volumes' => $mangaArray["volumes"],
            'chapters' => $mangaArray["chapters"],
            'status' => $mangaArray["status"],
            'genres' => $mangaArray["genres"],
            'is_adult' => $mangaArray["description"],
            'description' => $mangaArray["description"],
            'country_of_origin' => $mangaArray["countryOfOrigin"],
            'cover_image_path' => $mangaArray["coverImage"]["extraLarge"],
        ]);

        foreach ($mangaArray["staff"]["edges"] as $staff) {
            $manga->staff()->create([
                'name' => $staff["node"]["name"]["full"],
                'role' => $staff["role"],
                'image_path' => $staff["node"]["image"]["medium"],
            ]);
        }

        foreach ($mangaArray["characters"]["edges"] as $char) {
            $manga->characters()->create([
                'name' => $char["node"]["name"]["full"],
                'role' => $char["role"],
                'image_path' => $char["node"]["image"]["medium"],
            ]);
        }

        return $manga;
    }

    public function getMangas(Request $request)
    {
        $page = $request->page == null ? 1 : $request->page;

        $query = 'query ($page: Int, $name: String) {
            Page (page: $page, perPage: 30) {
                media(type: MANGA, sort: SCORE_DESC, search: $name, isAdult: false) {
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
            'page' => $page,
            'name' => $request->search,
        ];

        $response = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables,
        ]);

        return $response->json();
    }
}
