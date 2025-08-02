<?php

namespace App\Filament\Resources\Episodes\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use App\Filament\Tables\EpisodeTable;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Tables\ShowEpisodeTable;

class EpisodesTable
{
    public static function configure(Table $table): Table
    {
        return ShowEpisodeTable::configure($table);
    }
}
