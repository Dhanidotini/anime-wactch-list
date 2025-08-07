<?php

namespace App\Filament\Resources\Animes;

use App\Filament\Resources\Animes\RelationManagers\EpisodesRelationManager;
use BackedEnum;
use App\Models\Anime;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Animes\Pages\EditAnime;
use App\Filament\Resources\Animes\Pages\ListAnimes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Animes\Pages\CreateAnime;
use App\Filament\Resources\Animes\Schemas\AnimeForm;
use App\Filament\Resources\Animes\Tables\AnimesTable;

class AnimeResource extends Resource implements HasShieldPermissions
{
    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'delete',
        ];
    }
    protected static ?string $model = Anime::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AnimeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnimesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            EpisodesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAnimes::route('/'),
            'create' => CreateAnime::route('/create'),
            'edit' => EditAnime::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->where('author_id', auth()->id());
    // }
}
