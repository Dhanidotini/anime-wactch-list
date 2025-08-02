<?php

namespace App\Filament\Schemas;

use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Utilities\Set;

class CreateTitleSlugForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(static::schema());
    }

    public static function schema(?string $labelRelation = 'title'): Component
    {
        return Grid::make()
            ->columnSpanFull()
            ->schema([
                TextInput::make($labelRelation)
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn(Set $set, $state) => $set('slug', Str::slug($state))
                    ),
                TextInput::make('slug')
                    ->readOnly()
                    ->required()
            ]);
    }
}
