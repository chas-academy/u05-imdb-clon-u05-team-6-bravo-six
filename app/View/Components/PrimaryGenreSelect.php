<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrimaryGenreSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $selected;
    public function __construct($selected)
    {
        $this->selected = $selected;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.primary-genre-select');
    }
}
