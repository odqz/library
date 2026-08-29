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
        $query = 'query ($page: Int) {
            manga: Page(page: $page, perPage: 15) {
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

        $jsonData = $respone->json();

        return view('mangas.index', ['mangas' => $jsonData["data"]["manga"]["media"]]);
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
     * Display the specified resource.
     */
    public function show(Int $manga)
    {
        $query = 'query ($id: Int) {
            Media(id: $id, type: MANGA) {
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
                popularity
                characters {
                    edges {
                        role
                        node {
                            image {
                                medium
                            }
                            name {
                                full
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
                        }
                    }
                }
                coverImage {
                    extraLarge
                }
            }
        }';
 
        $variables = [
            "id" => $manga, 
        ];

        $respone = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables,
        ]);

        $jsonData = $respone->json();

        return view('mangas.show', ['manga' => $jsonData["data"]["Media"]]);
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
}
