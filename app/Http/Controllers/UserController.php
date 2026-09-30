<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Models\User;
use App\Models\Watching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        $user = Auth::user();

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
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
    }
}
