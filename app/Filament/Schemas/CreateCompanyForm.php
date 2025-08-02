<?php

namespace App\Filament\Schemas;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use App\Filament\Schemas\TitleAndSlug;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class CreateCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(static::schema());
    }
    public static function schema($labelRelation = null): Component
    {
        return Fieldset::make()
            ->contained(false)
            ->columnSpanFull()
            ->schema([
                CreateTitleSlugForm::schema($labelRelation),
                TextInput::make('native_name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                KeyValue::make('links_related')
                    ->columnSpanFull(),
                DateTimePicker::make('established_date'),
            ]);
    }
}
