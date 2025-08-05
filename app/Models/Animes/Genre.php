<?php

namespace App\Models\Animes;

use App\Models\Anime;
use App\Enums\GenreType;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    protected $fillable = ['name', 'slug', 'type'];

    protected $casts = [
        'type' => GenreType::class,
    ];
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
    public function allAnimes(): Collection
    {
        $animes = collect();

        if ($this->type === GenreType::Genre) {
            $animes = $this->animesAsGenre;
        } elseif ($this->type === GenreType::Theme) {
            $animes = $this->animesAsTheme;
        } elseif ($this->type === GenreType::Demographic) {
            $animes = $this->animesAsDemographic;
        } elseif ($this->type === GenreType::Explicit) {
            $animes = $this->animesAsExplicit;
        }

        return $animes;
    }
    public function animesAsGenre(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_genre',
            'genre_id',
            'anime_id'
        );
    }
    public function animesAsTheme(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_theme',
            'genre_id',
            'anime_id'
        );
    }
    public function animesAsDemographic(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_demographic',
            'genre_id',
            'anime_id'
        );
    }
    public function animesAsExplicit(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_explicit',
            'genre_id',
            'anime_id'
        );
    }

    public function scopeGenre($query)
    {
        return $query->where('type', GenreType::Genre);
    }
    public function scopeTheme($query)
    {
        return $query->where('type', GenreType::Theme);
    }
    public function scopeDemographic($query)
    {
        return $query->where('type', GenreType::Demographic);
    }
    public function scopeExplicit($query)
    {
        return $query->where('type', GenreType::Explicit);
    }
}
