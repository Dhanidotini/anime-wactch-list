<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Animes\Type;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $animes = Anime::where('')->with(['genres'])->latest()->paginate(6);
        $tvAnimes = Type::where('name', 'TV')
            ->firstOrFail()
            ->animes()
            ->latest()
            ->paginate(5);
        $movieAnimes = Type::where('name', 'Movie')
            ->firstOrFail()
            ->animes()
            ->latest()
            ->paginate(5);
        $genres = Genre::genre()->get();
        // return dd($animes);
        return view('pages.home', compact(['tvAnimes', 'movieAnimes', 'genres']));
    }
}
