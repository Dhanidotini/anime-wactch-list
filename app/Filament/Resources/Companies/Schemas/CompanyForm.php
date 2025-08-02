<?php

namespace App\Filament\Resources\Companies\Schemas;

use App\Filament\Resources\Animes\Schemas\AnimeForm;
use App\Filament\Schemas\CreateCompanyForm;
use App\Filament\Schemas\TitleAndSlug;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return CreateCompanyForm::configure($schema);
    }
}
