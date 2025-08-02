<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum GenreType: string implements HasLabel
{
    case Genre = 'genre';
    case Theme = 'theme';
    case Demographic = 'demographic';
    case Explicit = 'explicit';

    public function getLabel(): string
    {
        return $this->name;
    }
}
