<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Models\Anime;
use App\Enums\GenreType;
use App\Models\Animes\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     // return dd();
//     return view('welcome');
// });

Route::get("/", [HomeController::class, "index"])->name("home");

// Animes
Route::get("/anime/{anime}", [AnimeController::class, "show"])
    ->name("anime.show");
Route::get("/animes", [AnimeController::class, 'index'])
    ->name('anime.index');

// Anime Episode
Route::get("/anime/{anime}/episode/{episode}", [EpisodeController::class, 'show'])
    ->name('episode.show');

// Genres
Route::get("/genres", [GenreController::class, 'index'])
    ->name('genre.index');
Route::get("/genre/{genre:slug}", [GenreController::class, 'show'])
    ->name('genre.show');
