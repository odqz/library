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
        $query = '
        query ($id: Int) {
          Media (id: $id) {
            id
            title {
              english
              romaji
            }
            type
            averageScore
            chapters
            volumes
            status
            description
            coverImage {
                extraLarge
            }
          }
        }
        ';
 
        $variables = [
            "id" => 37375
        ];
 
        $respone = Http::post('https://graphql.anilist.co', [
            'query' => $query,
            'variables' => $variables
        ]);

        $jsonData = $respone->json();

        return view('mangas.index', ['mangas' => $jsonData["data"]["Media"]]);
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
    public function show(Manga $manga)
    {
        //
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
