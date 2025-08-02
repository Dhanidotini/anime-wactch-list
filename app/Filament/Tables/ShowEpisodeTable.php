<?php

namespace App\Filament\Tables;

use Filament\Tables\Table;
use App\Models\Animes\Episode;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;
use App\Filament\Resources\Animes\RelationManagers\EpisodesRelationManager;

class ShowEpisodeTable
{
    public static function table(): array
    {
        return [
            IconColumn::make('airing')
                ->boolean(),
            TextColumn::make('episode')
                ->numeric()
                ->sortable(),
            TextColumn::make('title')
                ->searchable(),
            TextColumn::make('anime.title')
                ->placeholder('No have anime yet.')
                ->hiddenOn(EpisodesRelationManager::class),
            TextColumn::make('release_date')
                ->since()
                ->dateTimeTooltip('l, d M Y H:i:s')
                ->sortable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->since()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('deleted_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
    public static function configure(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Episode::query())
            ->columns(static::table())
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
