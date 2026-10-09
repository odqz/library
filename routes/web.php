<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/login');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}/edit', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('readings')->name('readings.')->group(function () {
        Route::get('/new/{manga}', [ReadingController::class, 'create'])->name('new');
        Route::post('/', [ReadingController::class, 'store'])->name('store');
        Route::get('{reading}/edit', [ReadingController::class, 'edit'])->name('edit');
        Route::patch('/{reading}/edit', [ReadingController::class, 'update'])->name('update');
        Route::delete('/{reading}', [ReadingController::class, 'destroy'])->name('delete');
    });

    Route::prefix('watchings')->name('watchings.')->group(function () {
        Route::get('/new/{anime}', [WatchingController::class, 'create'])->name('new');
        Route::post('/', [WatchingController::class, 'store'])->name('store');
        Route::get('/{watching}/edit', [WatchingController::class, 'edit'])->name('edit');
        Route::patch('/{watching}/edit', [WatchingController::class, 'update'])->name('update');
        Route::delete('/{watching}/delete', [WatchingController::class, 'destroy'])->name('delete');
    });

    Route::delete('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('auth.login'); })->name('login');
    Route::post('/login', [SessionsController::class, 'store'])->name('login');
    Route::post('/create-account', [UserController::class, 'store'])->name('create-account');
});

Route::prefix('animes')->name('animes.')->group(function () {
    Route::get('/index/{page}', [AnimeController::class, 'index'])->name('index');
    Route::get('/{anime}', [AnimeController::class, 'show'])->name('show');
});

Route::prefix('mangas')->name('mangas.')->group(function () {
    Route::get('/index/{page}', [MangaController::class, 'index'])->name('index');
    Route::get('/{manga}', [MangaController::class, 'show'])->name('show');
});