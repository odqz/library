<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/{user}', [UserController::class, 'show']);
        Route::get('/{user}/edit', [UserController::class, 'edit']);
        Route::get('/{user}/filter', [UserController::class, 'show']);
    });

    Route::prefix('readings')->group(function () {
        Route::get('/new/{manga}', [ReadingController::class, 'create']);
        Route::post('/{manga}', [ReadingController::class, 'store']);
        Route::get('{reading}/edit', [ReadingController::class, 'edit']);
        Route::patch('/{reading}', [ReadingController::class, 'update']);
        Route::delete('/{reading}', [ReadingController::class, 'destroy']);
    });

    Route::prefix('watchings')->group(function () {
        Route::get('/new/{anime}', [WatchingController::class, 'create']);
        Route::post('/{anime}', [WatchingController::class, 'store']);
        Route::get('/{watching}/edit', [WatchingController::class, 'edit']);
        Route::patch('/{watching}', [WatchingController::class, 'update']);
        Route::delete('/{watching}', [WatchingController::class, 'destroy']);
    });

    Route::delete('/delete-account', [UserController::class, 'destroy']);
    Route::delete('/logout', [SessionsController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('auth.login'); });
    Route::post('/login', [SessionsController::class, 'store']);
    Route::post('/create-account', [UserController::class, 'store']);
});

Route::get('/animes/index/{page}', [AnimeController::class, 'index']);
Route::get('/animes/{anime}', [AnimeController::class, 'show']);

Route::get('/mangas/index/{page}', [MangaController::class, 'index']);
Route::get('/mangas/{manga}', [MangaController::class, 'show']);