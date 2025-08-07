<?php

namespace App\Filament\Resources\Animes\Pages;

use App\Filament\Resources\Animes\AnimeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnime extends CreateRecord
{
    protected static string $resource = AnimeResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
