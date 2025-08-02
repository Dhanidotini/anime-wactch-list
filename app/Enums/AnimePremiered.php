<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AnimePremiered: string implements HasLabel
{
    case Winter = 'winter';
    case Spring = 'spring';
    case Summer = 'summer';
    case Fall = 'fall';
    public function getLabel(): string
    {
        return $this->name;
    }
}
