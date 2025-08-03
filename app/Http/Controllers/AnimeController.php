<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AnimeController extends Controller
{
    public function index(): View
    {
        $animes = Anime::latest()->get();
        $genres = Genre::genre()->get();
        return view("pages.animes.index", compact(["animes", "genres"]));
    }
    public function show(string $slug): View
    {
        $anime = Anime::where('slug', $slug)->first();
        $genres = Genre::genre()->get();
        return view('pages.animes.show', compact(['anime', 'genres']));
    }
}
