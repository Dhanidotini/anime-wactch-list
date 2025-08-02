<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animes = Anime::with(['genres'])->latest()->paginate(6);
        $genres = Genre::genre()->get();
        return view('pages.home', compact(['animes', 'genres']));
    }
}
