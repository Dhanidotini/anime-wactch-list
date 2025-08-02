<?php

namespace App\Filament\Resources\Episodes\Schemas;

use App\Filament\Schemas\CreateEpisodeForm;
use Filament\Schemas\Schema;

class EpisodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return CreateEpisodeForm::configure($schema);
    }
}
