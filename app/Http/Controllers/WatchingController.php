<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWatchingRequest;
use App\Models\Anime;
use App\Models\Watching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WatchingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Int $id)
    {
        Gate::authorize('create', Watching::class);
        
        return view('consumption.create', ['media' => Anime::find($id), 'type' => 'anime']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWatchingRequest $request)
    {
        Gate::authorize('create', Watching::class);

        Auth::user()->watchings()->create($request->validated());

        $user = Auth::user();    

        return redirect("/users/$user->id");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Watching $watching)
    {
        Gate::authorize('modify', $watching);

        return view('consumption.edit', ['consumption' => $watching, 'media' => $watching->anime, 'type' => 'watching']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Watching $watching)
    {
        Gate::authorize('modify', $watching);

        $watching = $watching->update([
            'episodes_watched' => $request->episodes,
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
    public function destroy(Watching $watching)
    {
        Gate::authorize('modify', $watching);

        $watching->delete();

        $id = Auth::user()->id;

        return redirect("/users/$id");
    }
}
