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
        try {
            $tvAnimes = Type::where('name', 'TV')
                ->first()
                ->animes()
                ->latest()
                ->paginate(5);
            $movieAnimes = Type::where('name', 'Movie')
                ->first()
                ->animes()
                ->latest()
                ->paginate(5);
        } catch (\Throwable $th) {
            $tvAnimes = [];
            $movieAnimes = [];
        }
        $genres = Genre::genre()->get();
        return view('pages.home', compact(['tvAnimes', 'movieAnimes', 'genres']));
    }
}
