<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function show(string $slug)
    {
        $anime = Anime::where('slug', $slug)->first();
        $genres = Genre::genre()->get();
        return view('pages.animes.show', compact(['anime', 'genres']));
    }
}
