<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TitleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $watchlists;
    public function __construct($title, $watchlists)
    {
        $this->title = $title;
        $this->watchlists = $watchlists;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.title-card');
    }
}
