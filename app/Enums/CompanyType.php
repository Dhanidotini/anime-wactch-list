<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CompanyType: string implements HasLabel
{
    case Unknown = "unknown";
    case Studio = 'studio';
    case Licensor = 'licensor';
    case Producer = 'producer';
    public function getLabel(): string
    {
        return $this->name;
    }
}
