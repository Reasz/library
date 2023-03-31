<?php

namespace App\View\Components;

use App\Models\Genre;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GenresDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.genres-dropdown', [
            'genres' => Genre::all(),
            'currentGenre' => Genre::firstWhere('id', request('genres'))
        ]);
    }
}
