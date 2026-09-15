<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Int $id)
    {
        return view('readings.create', ['manga' => Manga::find($id)]);
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

        $userid = Auth::user()->id;    

        return redirect("/users/$userid");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reading $reading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reading $reading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reading $reading)
    {
        //
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
