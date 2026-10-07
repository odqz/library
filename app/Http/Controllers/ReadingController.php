<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadingRequest;
use App\Models\Manga;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReadingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Int $id)
    {
        Gate::authorize('create', Reading::class);

        return view('consumption.create', ['media' => Manga::find($id), 'type' => 'manga']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadingRequest $request)
    {
        Gate::authorize('create', Reading::class);

        Auth::user()->readings()->create($request->validated());

        $user = Auth::user();    

        return redirect("/users/$user->id");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reading $reading)
    {
        Gate::authorize('modify', $reading);

        return view('consumption.edit', ['consumption' => $reading, 'media' => $reading->manga, 'type' => 'reading']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reading $reading)
    {
        Gate::authorize('modify', $reading);

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
        Gate::authorize('modify', $reading);
        
        $reading->delete();

        $id = Auth::user()->id;

        return redirect("/users/$id");
    }
}
