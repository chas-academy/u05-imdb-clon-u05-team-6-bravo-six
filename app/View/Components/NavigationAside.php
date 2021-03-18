<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavigationAside extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $currentPage;
    public function __construct($currentPage = null)
    {
        //
        $this->currentPage = $currentPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation-aside');
    }
}
