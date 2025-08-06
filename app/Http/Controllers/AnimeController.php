<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Animes\Type;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AnimeController extends Controller
{
    public function index(): View
    {
        $animes = Anime::latest()->paginate(10);
        $genres = Genre::genre()->get();
        return view("pages.animes.index", compact(["animes", "genres"]));
    }
    public function movie(): View
    {
        $name = 'Movie Anime';
        $animes = Type::where('name', 'Movie')->firstOrFail()->animes()->latest()->paginate(10);
        $genres = Genre::genre()->get();
        return view("pages.animes.index", compact(["animes", "genres", 'name']));
    }
    public function show(string $slug): View
    {
        $anime = Anime::where('slug', $slug)->first();
        $episodes = $anime->episodes->where('airing', true)->all();
        $genres = Genre::genre()->get();
        return view('pages.animes.show', compact(['anime', 'genres', 'episodes']));
    }
}
