<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMangaRequest;
use App\Http\Requests\UpdateMangaRequest;
use App\Models\Manga;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mangas = $this->getMultipleMangas();
        return $mangas["data"] == null ? view('api-error') : view('mangas.index', ['mangas' => $this->convertMangasDetails($mangas["data"]["manga"]["media"])]);
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
    public function store(StoreMangaRequest $request)
    {
        //
    }

    /**
     * This function displays the manga show page but also adds the manga to the db if it doesnt already exist
     */
    public function show(Int $id)
    {
        if (Manga::where('id', $id)->exists()) {
            return view('mangas.show', ['manga' => Manga::find($id)]);
        } else {
            $manga = $this->getIndividualManga($id);
            return $manga["data"] == null ? view('api-error') : view('mangas.show', ['manga' => $this->createManga($manga["data"]["Media"])]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manga $manga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMangaRequest $request, Manga $manga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manga $manga)
    {
        //
    }

    public function getMultipleMangas()
    {
        $query = 'query ($page: Int) {
            manga: Page(page: $page, perPage: 30) {
                media(type: MANGA, sort: SCORE_DESC) {
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
}
