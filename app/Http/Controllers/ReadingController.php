<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Int $id)
    {
        return view('consumption.create', ['media' => Manga::find($id), 'type' => 'manga']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Int $id)
    {
        $reading = Auth::user()->readings()->create([
            'manga_id' => $id,
            'chapters_read' => $request->chapters,
            'volumes_read' => $request->volumes,
            'status' => $request->status,
            'score' => $request->score,
            'notes' => $request->notes,
        ]);

        $user = Auth::user();    

        return redirect("/users/$user->id");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reading $reading)
    {
        return view('consumption.edit', ['consumption' => $reading, 'media' => $reading->manga, 'type' => 'reading']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reading $reading)
    {
        $reading = $reading->update([
            'volumes_read' => $request->volumes,
            'chapters_read' => $request->chapters,
            'status' => $request->status,
            'score' => $request->score,
            'notes' => $request->notes,
        ]);

        $id = Auth::user()->id;

        return redirect("/users/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reading $reading)
    {
        $reading->delete();

        $id = Auth::user()->id;

        return redirect("/users/$id");
    }
}
