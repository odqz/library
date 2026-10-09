<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Reading;
use App\Models\User;
use App\Models\Watching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        Gate::authorize('modify', $user);

        if (count($request->all()) == 0 || count($request->all()) == 6) {
            $readings = $user->readings;
            $watchings = $user->watchings;
        } else {
            $readings = $this->filterReadings($user, $request);
            $watchings = $this->filterWatchings($user, $request);
        }

        $checkedBoxes = $request->all();

        return view('consumption.index', ['readings' => $readings, 'watchings' => $watchings, 'user' => $user, 'checkedBoxes' => $checkedBoxes]);
    }

    public function filterReadings(User $user, Request $request)
    {
        Gate::authorize('modify', $user);

        $readings = [];

        $readingsArray = $user->readings()
            ->where('status', $request->planned)
            ->orWhere('status', $request->reading)
            ->orWhere('status', $request->completed)
            ->orWhere('status', $request->paused)
            ->orWhere('status', $request->dropped)
            ->get()->toArray();

        foreach ($readingsArray as $reading) {
            array_push($readings, new Reading($reading));
        }

        return $readings;
    }

    public function filterWatchings(User $user, Request $request)
    {
        Gate::authorize('modify', $user);
        
        $watchings = [];
        
        $watchingsArray = $user->watchings()
            ->where('status', $request->planned)
            ->orWhere('status', $request->watching)
            ->orWhere('status', $request->completed)
            ->orWhere('status', $request->paused)
            ->orWhere('status', $request->dropped)
            ->get()->toArray();

        foreach ($watchingsArray as $watching) {
            array_push($watchings, new Watching($watching));
        }

        return $watchings;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('modify', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('modify', $user);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('users.edit', ['user' => $user])->withErrors(['Password is incorrect. Please try again.']);
        }

        $user->update([
            'password' => Hash::make($request->password_confirmation),
        ]);

        return redirect()->route('users.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('modify', $user);

        $user->delete();

        return redirect('/');
    }
}
