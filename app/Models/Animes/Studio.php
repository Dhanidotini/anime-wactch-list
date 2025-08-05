<?php

namespace App\Models\Animes;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Studio extends Model
{
    protected $fillable = ['name', 'slug'];
    public function animes(): BelongsToMany
    {
        return $this->belongsToMany(Anime::class);
    }
}
