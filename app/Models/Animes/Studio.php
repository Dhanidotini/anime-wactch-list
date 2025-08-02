<?php

namespace App\Models\Animes;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Studio extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
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

    public function animes(): BelongsToMany
    {
        return $this->belongsToMany(Anime::class);
    }
}
