<?php

namespace App\View\Components\ui;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $modalHeader=true;
    public $title='';
    public function __construct($id,$modalHeader,$title)
    {
        $this->id=$id;
        $this->modalHeader=$modalHeader;
        $this->title=$title;
    }
    
    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
    public function render()
    {
        return view('components.ui.modal');
    }
}