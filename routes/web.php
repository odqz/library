<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'show']);

    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);

    Route::get('/readings/new/{manga}', [ReadingController::class, 'create']);
    Route::post('/readings/{manga}', [ReadingController::class, 'store']);
    Route::get('/readings/{manga}', [ReadingController::class, 'show']);
    Route::get('/readings/{reading}/edit', [ReadingController::class, 'edit']);
    Route::patch('/readings/{reading}', [ReadingController::class, 'update']);
    Route::delete('/readings/{reading}', [ReadingController::class, 'destroy']);

    Route::get('/watchings/new/{anime}', [WatchingController::class, 'create']);
    Route::post('/watchings/{anime}', [WatchingController::class, 'store']);
    Route::get('/watchings/{watching}/edit', [WatchingController::class, 'edit']);
    Route::patch('/watchings/{watching}', [WatchingController::class, 'update']);
    Route::delete('/watchings/{watching}', [WatchingController::class, 'destroy']);

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