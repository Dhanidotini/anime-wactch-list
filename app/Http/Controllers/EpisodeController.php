<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animes\Episode;

class EpisodeController extends Controller
{
    public function show(string $animeSlug, string $episodeId)
    {
        $episode = Episode::where('episode', $episodeId)->first();
        return view('pages.episodes.show', compact(['episode']));
    }
}
