<?php

namespace App\Models\Animes;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'native_name',
        'description',
        'links_related',
        'slug',
        'established_date',
    ];

    protected function casts()
    {
        return [
            'links_related' => 'array',
        ];
    }

    protected function dates()
    {
        return [
            'establised_date'
        ];
    }
    public function animesAsStudio(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_studio',
            'company_id',
            'anime_id'
        );
    }
    public function animesAsProducer(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_producer',
            'company_id',
            'anime_id'
        );
    }
    public function animesAsLicensor(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_licensor',
            'company_id',
            'anime_id'
        );
    }
}
