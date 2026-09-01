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

        $jsonData = $respone->json();

        return view('animes.index', ['animes' => $jsonData["data"]["anime"]["media"]]);
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
    public function show(iNT $anime)
    {
        $query = 'query ($id: Int) {
            Media(id: $id, type: ANIME) {
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
            "id" => $anime,
        ];

        $respone = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables,
        ]);

        $jsonData = $respone->json();

        return view('animes.show', ['anime' => $jsonData["data"]["Media"]]);
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
}
