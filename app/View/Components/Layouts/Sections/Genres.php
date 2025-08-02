<?php

namespace App\View\Components\Layouts\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Genres extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $genres)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.sections.genres');
    }
}
