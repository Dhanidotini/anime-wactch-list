<?php

namespace App\Filament\Resources\Animes\Schemas;

use App\Models\Animes\Genre;
use Closure;
use App\Enums\GenreType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Enums\AnimePremiered;
use function Laravel\Prompts\form;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use App\Filament\Schemas\TitleAndSlug;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Component;
use App\Filament\Schemas\CreateCompanyForm;
use App\Filament\Schemas\CreateTitleSlugForm;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Set;
use PHPUnit\Runner\Filter\GroupFilterIterator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\View\Compilers\ComponentTagCompiler;
use App\Filament\Resources\Companies\Schemas\CompanyForm;

class AnimeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columnSpanFull()
                    ->relationship('image')
                    ->schema([
                        FileUpload::make('attachment')
                            ->label('Poster')
                            ->deletable(false)
                            ->storeFileNamesIn('attachment_origin')
                            ->image()
                            ->maxSize(250)
                            ->moveFile()
                            ->openable()
                            ->disk('public')
                            ->directory('poster')
                            ->visibility('public'),
                    ]),
                CreateTitleSlugForm::schema(),
                TextInput::make('title_eng'),
                TextInput::make('title_jp'),
                Textarea::make('synopsis')
                    ->columnSpanFull()
                    ->required(),
                Grid::make()
                    ->columnSpanFull()
                    ->schema([
                        DateTimePicker::make('airing_date_start')
                            ->label('Airing Start')
                            ->native(false),
                        DateTimePicker::make('airing_date_end')
                            ->label('Airing End')
                            ->native(false),
                    ]),
                Select::make('type')
                    ->relationship('type', 'name')
                    ->preload()
                    ->createOptionModalHeading('Create type of anime')
                    ->createOptionForm([CreateTitleSlugForm::schema('name')])
                    ->editOptionForm([CreateTitleSlugForm::schema('name')]),
                Select::make('source')
                    ->relationship('source', 'name')
                    ->preload()
                    ->createOptionModalHeading('Create source of anime')
                    ->createOptionForm([CreateTitleSlugForm::schema('name')])
                    ->editOptionForm([CreateTitleSlugForm::schema('name')]),
                Select::make('status')
                    ->relationship('status', 'name')
                    ->preload()
                    ->createOptionModalHeading('Create type of anime')
                    ->createOptionForm([CreateTitleSlugForm::schema('name')]),
                Select::make('premiered')
                    ->options(AnimePremiered::class),
                Group::make()
                    ->schema([
                        Select::make('studios')
                            ->relationship('studios', 'name')
                            ->disablePlaceholderSelection()
                            ->preload()
                            ->multiple()
                            ->createOptionModalHeading('Create studios company')
                            ->createOptionForm([CreateCompanyForm::schema('name')])
                            ->editOptionForm([CreateCompanyForm::schema('name')]),
                        Select::make('producers')
                            ->relationship('producers', 'name')
                            ->disablePlaceholderSelection()
                            ->multiple()
                            ->preload()
                            ->createOptionModalHeading('Create producers company')
                            ->createOptionForm([CreateCompanyForm::schema('name')]),
                        Select::make('licensors')
                            ->relationship('licensors', 'name')
                            ->disablePlaceholderSelection()
                            ->multiple()
                            ->preload()
                            ->createOptionModalHeading('Create licensors company')
                            ->createOptionForm([CreateCompanyForm::schema('name')]),
                    ]),
                Group::make()
                    ->schema([
                        Select::make('genres')
                            ->relationship(
                                'genres',
                                'name',
                                fn(Builder $query) => $query->genre()
                            )
                            ->disablePlaceholderSelection()
                            ->preload()
                            ->multiple()
                            ->createOptionModalHeading('Create genre of Anime')
                            ->createOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Genre),
                                CreateTitleSlugForm::schema('name'),
                            ])
                            ->editOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Genre),
                                CreateTitleSlugForm::schema('name'),
                            ]),
                        Select::make('demographics')
                            ->relationship(
                                'demographics',
                                'name',
                                fn(Builder $query) => $query->demographic()
                            )
                            ->disablePlaceholderSelection()
                            ->preload()
                            ->multiple()
                            ->createOptionModalHeading('Create demographic genre of Anime')
                            ->createOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Demographic),
                                CreateTitleSlugForm::schema('name'),
                            ])
                            ->editOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Demographic),
                                CreateTitleSlugForm::schema('name'),
                            ]),
                        Select::make('themes')
                            ->relationship(
                                'themes',
                                'name',
                                fn(Builder $query) => $query->theme()
                            )
                            ->disablePlaceholderSelection()
                            ->preload()
                            ->multiple()
                            ->createOptionModalHeading('Create theme genre of Anime')
                            ->createOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Theme),
                                CreateTitleSlugForm::schema('name'),
                            ])
                            ->editOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Theme),
                                CreateTitleSlugForm::schema('name'),
                            ]),
                        Select::make('explicits')
                            ->relationship(
                                'explicits',
                                'name',
                                fn(Builder $query) => $query->explicit()
                            )
                            ->label('Explicit Genre')
                            ->disablePlaceholderSelection()
                            ->preload()
                            ->multiple()
                            ->createOptionModalHeading('Create explicit genre of Anime')
                            ->createOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Explicit),
                                CreateTitleSlugForm::schema('name'),
                            ])
                            ->editOptionForm([
                                Select::make('type')
                                    ->options(GenreType::class)
                                    ->default(GenreType::Explicit),
                                CreateTitleSlugForm::schema('name'),
                            ]),
                    ])
            ]);
    }
}
