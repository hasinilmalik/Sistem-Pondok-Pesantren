<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $href;
    public $icon;
    public $text;
    public $active;

    public function __construct($href, $icon, $text, $active)
    {       
        $this->href = $href;
        $this->icon = $icon;
        $this->text = $text;
        $this->active = $active;
    }
    public function render()
    {
        return view('components.menu');
    }
}
