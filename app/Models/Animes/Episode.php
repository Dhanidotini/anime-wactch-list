<?php

namespace App\Models\Animes;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'episode',
        'title',
        'release_date',
        'airing',
        'anime_id',
        'length',
        'native_title',
        'translate_native_title',
        'id_video',
    ];
    protected $casts = [
        'episode' => 'integer',
        'length' => 'integer',
        'airing' => 'boolean',
        'release_date' => 'datetime'
    ];
    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
