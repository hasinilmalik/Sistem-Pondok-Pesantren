<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
    
     */
    public $name;
    public $label;
    public $options=[];

    public function __construct($options=[], $name, $label='')
    {
        $this->options=$options;
        $this->name=$name;
        $this->label=$label ?: $name;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}