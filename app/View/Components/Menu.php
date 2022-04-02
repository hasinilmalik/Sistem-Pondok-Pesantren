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
    public $judul;
    public $text;
    public $url;
    public $icon;
    public $status=null;
    public function __construct($judul,$text,$url,$icon, $status='')
    {
        $this->judul = $judul;
        $this->text = $text;
        $this->url = $url;
        $this->icon = $icon;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
