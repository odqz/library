<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/mangas/', [MangaController::class, 'index']);
    Route::get('/animes/', [AnimeController::class, 'index']);
    Route::get('/mangas/{manga}', [MangaController::class, 'show']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::delete('/logout', [SessionsController::class, 'destroy']);
    Route::delete('/delete-account', [UserController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('auth.login'); });
    Route::post('/login', [SessionsController::class, 'store']);
    Route::post('/create-account', [UserController::class, 'store']);
});