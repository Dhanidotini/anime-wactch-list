<?php

namespace App\Models\Animes;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    protected $fillable = ['name', 'slug'];

    public function animes(): HasMany
    {
        return $this->hasMany(Anime::class);
    }
}
