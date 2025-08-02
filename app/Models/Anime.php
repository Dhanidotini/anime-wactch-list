<?php

namespace App\Models;

use App\Enums\AnimePremiered;
use App\Models\Animes\Company;
use App\Models\Animes\Episode;
use App\Models\Animes\Genre;
use App\Models\Animes\Source;
use App\Models\Animes\Type;
use App\Models\Animes\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anime extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $casts = [
        'premiered' => AnimePremiered::class,
        'airing_date_start' => 'datetime:l, d M Y H:i:s',
        'airing_date_end' => 'datetime:l, d M Y H:i:s',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
    public function studios(): BelongsToMany
    {
        return $this->belongsToMany(
            Company::class,
            'anime_studio',
            'anime_id',
            'company_id'
        );
    }
    public function producers(): BelongsToMany
    {
        return $this->belongsToMany(
            Company::class,
            'anime_producer',
            'anime_id',
            'company_id'
        );
    }
    public function licensors(): BelongsToMany
    {
        return $this->belongsToMany(
            Company::class,
            'anime_licensor',
            'anime_id',
            'company_id'
        );
    }
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'anime_genre',
            'anime_id',
            'genre_id'
        );
    }
    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'anime_theme',
            'anime_id',
            'genre_id'
        );
    }
    public function demographics(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'anime_demographic',
            'anime_id',
            'genre_id'
        );
    }
    public function explicits(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'anime_explicit',
            'anime_id',
            'genre_id'
        );
    }
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}
