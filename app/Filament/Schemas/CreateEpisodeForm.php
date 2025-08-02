<?php

namespace App\Filament\Schemas;

use App\Filament\Resources\Animes\RelationManagers\EpisodesRelationManager;
use App\Models\Animes\Episode;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class CreateEpisodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('episode')
                    ->default(1)
                    ->live(true)
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->default(fn(Get $get) => 'Episode ' . $get('episode')),
                TextInput::make('id_video')
                    ->label('Slug Video')
                    ->prefix(config('services.abyss.slug'), true),
                DateTimePicker::make('release_date')
                    ->format('l, d M Y H:i:s')
                    ->displayFormat('l, d M Y H:i:s')
                    ->live()
                    ->locale('id')
                    ->default(now())
                    ->native(false),
                Toggle::make('airing')
                    ->required(),
                Select::make('anime_id')
                    ->relationship('anime', 'title')
                    ->hiddenOn(EpisodesRelationManager::class),
            ]);
    }
}
