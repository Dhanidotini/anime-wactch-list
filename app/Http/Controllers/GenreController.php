<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Enums\GenreType;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::genre()->get();
        $themes = Genre::theme()->get();
        $demographics = Genre::demographic()->get();
        $explicits = Genre::explicit()->get();
        return view("pages.genres.index", compact(['genres', 'themes', 'demographics', 'explicits']));
    }

    public function showGenre(string $genre)
    {
        $genre = Genre::findBySlug($genre);
        $genres = Genre::genre()->get();
        return view('pages.genres.show', compact(['genre', 'genres']));
    }
}
